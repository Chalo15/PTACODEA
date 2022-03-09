<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Availability;
use App\Models\Appointment;
use App\Models\User;


class AppointmentNotification extends Notification
{
    use Queueable;
    private $role;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->role = $appointment->availability->user->role_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('PTA CODEA')
            ->line($this->appoitment->user->name)
            ->action($this->appoitment['AppoitmentText'], $this->appoitment['actionurl'])
            ->line('Thank you for using our application!');
    }
    public function toDatabase($notifiable)
    {

        return [
            'Id_Atleta' => $this->appointment->athlete->user->identification,
            'Nombre_Atleta' => $this->appointment->athlete->user->name,
            'Apellidos_Atleta' => $this->appointment->athlete->user->last_name,
            'Id_Encargado' => $this->appointment->availability->user->identification,
            'Nombre_Encargado' => $this->appointment->availability->user->name,
            'Role_Encargado' => $this->appointment->availability->user->role->description,
            'Apellidos_Encargado' => $this->appointment->availability->user->last_name,
            'Date' => $this->appointment->availability->date,
            'Start' => $this->appointment->availability->start,
            'End' => $this->appointment->availability->end,
            'State' => $this->appointment->availability->state
        ];


        //Si la solicitud procede de un usuario Atleta
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
}
