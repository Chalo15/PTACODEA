<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Appointment;
use App\Notifications\AppointmentNotification;

class ConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function data()
    {
        return [

            'Id_Instructor' => $this->appointment->coach->user->identification,
            'Nombre_Instructor' => $this->appointment->coach->user->name,
            'Apellidos_Instructor' => $this->appointment->coach->user->last_name,

            'Id_Encargado' => $this->appointment->availability->user->identification,
            'Nombre_Encargado' => $this->appointment->availability->user->name,
            'Apellidos_Encargado' => $this->appointment->availability->user->last_name,
            'Rol_Encargado' => $this->appointment->availability->user->role->description,
            'Date' => $this->appointment->availability->date,
            'Start' => $this->appointment->availability->start,
            'End' => $this->appointment->availability->end,
            'State' => $this->appointment->availability->state
        ];
    }

    public function build()
    {
        $datos = $this->data();
        return $this->markdown('emails.confirm', compact('datos'));
    }
}
