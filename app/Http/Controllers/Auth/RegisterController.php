<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Mail\CredentialsMail;
use App\Models\Sport;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'identification'         => ['required', 'unique:users'],
                'name'                   => ['required'],
                'last_name'              => ['required'],
                'email'                  => ['required', 'email', 'max:60', 'unique:users'],
                'phone'                  => ['required'],
                'password'               => ['required', 'min:8', 'confirmed'],
                'sport_id'               => ['required'],
                'blood'                  => ['required'],
                'laterality'             => ['required'],
                'district'               => ['required'],
                'canton'                 => ['required'],
                'category'               => ['required'],
                'policy'                 => ['required','min:3', 'max:10'],
                'name_manager'           => ['min:3', 'max:30'],
                'lastname_manager'       => ['min:3', 'max:30'],
                'manager'                => ['min:3', 'max:15'],
                'identification_manager' => ['min:9', 'max:15'],
                'contact_manager'        => ['digits:8'],

            ],
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //Envia por correo el Id y el password del usuario
        $id = $data['identification'];
        $password = $data['password'];
        $email = $data['email'];
        //Sending an email with the password and the identification
        Mail::to($email)->send(new CredentialsMail($id, $password));
        $data['role_id'] = 4;
        $data['state'] = 'R';
        return User::create($data);
    }
}
