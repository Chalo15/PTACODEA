<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Appointment;
use App\Notifications\AppointmentNotification;

class PhysioConfirmMail extends Mailable
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
            'Id_Atleta' => $this->appointment->athlete->user->identification,
            'Nombre_Atleta' => $this->appointment->athlete->user->name,
            'Apellidos_Atleta' => $this->appointment->athlete->user->last_name,
            'Id_Fisioterapeuta' => $this->appointment->availability->user->identification,
            'Nombre_Fisioterapeuta' => $this->appointment->availability->user->name,
            'Apellidos_Fisioterapeuta' => $this->appointment->availability->user->last_name,
            'Date' => $this->appointment->availability->date,
            'Start' => $this->appointment->availability->start,
            'End' => $this->appointment->availability->end,
            'State' => $this->appointment->availability->state,
            'Role' => $this->appointment->availability->user->role_id
        ];
    }
    public function build()
    {
        $datos = $this->data();
        return $this->markdown('emails.physioMail', compact($datos));
    }
}