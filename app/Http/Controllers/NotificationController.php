<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\AppointmentNotification;
use App\Models\Appointment;
use App\Mail\ConfirmMail;
use App\Mail\PhysioConfirmMail;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    /**
     * Cree una nueva instancia de controlador.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {

        $notifications = request()->user()->notifications;

        return view('notifications.index', compact('notifications'));
    }
    //muestra las notificaciones no leidas
    public function indexApi(Request $request)
    {
        return $request->user()->unreadNotifications;
    }


    public function markAsRead($notification_id, $appoitment)
    {
        auth()->user()->unreadNotifications->when($notification_id, function ($query) use ($notification_id) {
            return $query->where('id', $notification_id);
        })->markAsRead();
        $appointments = Appointment::with('availability')->get();

        return view('appointments.index', compact('appointments'));
    }
    public function markNotification($id)
    {
        auth()->user()
            ->unreadNotifications
            ->when($id, function ($query) use ($id) {
                return $query->where('id', $id);
            })
            ->markAsRead();
        return response()->json();
    }

    public function markAll()
    {

        auth()->user()->unreadNotifications->markAsRead();
        return response()->noContent();
    }
    //muestra las notificaciones leidas
    public function readNotifications(Request $request)
    {
        return $request->user()->readNotifications;
    }

    public function deny(Appointment $appoitment)
    {
    }
    public function accept(Appointment $appointment)
    {
        $appointment->availability->update(['state' => 'CONFIRMADA']);

        $appointment->availability->update(['state' => 'CONFIRMADA']);


        //Envio de notificacion al Atleta;
        User::where('identification', $appointment->athlete->user->identification)
            ->each(function (User $user) use ($appointment) {
                $user->notify(new AppointmentNotification($appointment));
            });

        //Rol del usuario, ya sea de musculacion o fisioterapeuta
        $role = $appointment->availability->user->role_id;

        //Email de confirmacion del usuario a notificar, en este caso seria al 
        //usuario que pidio la reserva
        $email = $appointment->athlete->user->email;


        //Envio de email al usuario que pidio una reserva para musculacion
        if ($role == 6) {
            Mail::to($email)->send(new ConfirmMail());
        }
        //Envio de email al usuario que pidio una reserva para fisioterapia
        elseif ($role == 5) {
            Mail::to($email)->send(new PhysioConfirmMail());
        }


        return redirect()->route('appointments.index')->with('status', 'Cita confirmada exitosamente!');
    }
}
