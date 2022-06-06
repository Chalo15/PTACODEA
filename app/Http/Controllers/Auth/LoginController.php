<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request)
    {

        $user = request()->user();

        if ($user->role_id == 3 && $user->athlete->state == 'R') {
            Auth::logout();
            return view('auth/login')->with('status', '¡Su perfil esta en proceso de aceptación, por favor sea paciente!');
        }
        if ($user->role_id != 3 && $user->condition == 'I') {
            Auth::logout();
            return view('auth/login')->with('status', '¡Su perfil esta en proceso de aceptación, por favor sea paciente!');
        }
        else {
            return redirect('/');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only('identification', 'password');

        return $credentials;
    }

    public function username()
    {
        return 'identification';
    }
}
