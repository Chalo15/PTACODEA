<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdatePersonalInformationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $genders = config('general.genders');

        $provinces = config('general.provinces');

        return view('profile.index', compact('user', 'genders', 'provinces'));
    }

    public function updatePicture(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|mimes:jpg,jpeg,png,svg|max:1024'
        ]);

        $user = $request->user();

        if ($request->hasFile("imagen")) {

            $img = $request->file('imagen');
            $imgseleccionada = "prf_" . time() . "." . $img->guessExtension();
            $url = public_path("storage/imagenes/" . $imgseleccionada);

            if ($img->guessExtension() == "jpeg" || $img->guessExtension() == "png" || $img->guessExtension() == "svg" || $img->guessExtension() == "jpg") {
                copy($img, $url);
                $user->photo = $imgseleccionada;
            }
        }

        $user->save();

        return redirect()->route('profile.index')->with('status', 'Foto actualizada exitosamente.');
    }

    public function updatePersonalInformation(UpdatePersonalInformationRequest $request)
    {
        $user = $request->user();

        $user->update($request->validated());

        return redirect()->route('profile.index')->with('status', 'Información personal actualizada exitosamente.');
    }

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
