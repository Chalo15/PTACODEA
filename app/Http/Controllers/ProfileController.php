<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdatePersonalInformationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     *
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $genders = config('general.genders');

        $provinces = config('general.provinces');

        return view('profile.index', compact('user', 'genders', 'provinces'));
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

        return redirect()->route('profile.index')->with('status', 'Contraseña cambiada exitosamente.');
    }
}
