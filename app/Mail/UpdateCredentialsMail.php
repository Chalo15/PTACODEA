<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateCredentialsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $password)
    {
        $this->id = $id;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function data()
    {
        return [
            'Id' => $this->id,
            'Password' => $this->password
        ];
    }

    public function build()
    {
        $datos = $this->data();
        return $this->markdown('emails.updateCredentialsMail', compact('datos'));
    }
}
