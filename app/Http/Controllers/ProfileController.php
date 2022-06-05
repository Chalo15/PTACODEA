<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdatePersonalInformationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Mail\UpdateCredentialsMail;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    /**
     *
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $genders = config('general.genders');

        $districts = config('general.districts');

        return view('profile.index', compact('user', 'genders', 'districts'));
    }

    /**
     *
     */
    public function updatePicture(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:png,jpg']
        ]);

        $path = $request->file('image')->store('images');

        $user = $request->user();

        Storage::delete($user->photo);

        $user->update(['photo' => $path]);

        return redirect()->route('profile.index')->with('status', 'Foto actualizada exitosamente.');
    }

    /**
     *
     */
    public function updatePersonalInformation(UpdatePersonalInformationRequest $request)
    {

        $user = $request->user();

        $user->update($request->validated());

        return redirect()->route('profile.index')->with('status', 'Información personal actualizada exitosamente.');
    }

    /**
     *
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {



        $user = $request->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña digitada no es la misma que la actual.']);
        }

        $user->update($request->validated());

        //Envia las credenciales por correo del athleta registrado, Id y Password
        $id = $request->user()->identification;

        $password = $request->password;
        $email = $request->user()->email;
        //Sending an email with the password and the identification
        Mail::to($email)->send(new UpdateCredentialsMail($id, $password));


        return redirect()->route('profile.index')->with('status', 'Contraseña cambiada exitosamente.');
    }
}
