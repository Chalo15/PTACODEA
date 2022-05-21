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
                'identification'         => ['required', 'min:9', 'max:15', 'unique:users'],
                'name'                   => ['required', 'string', 'min:3', 'max:30'],
                'last_name'              => ['required', 'string', 'min:3', 'max:30'],
                'email'                  => ['required', 'email', 'max:60', 'unique:users'],
                'phone'                  => ['required', 'digits:8', 'numeric'],
                'password'               => ['required', 'min:8', 'confirmed'],
                'sport_id'               => ['required'],
                'blood'                  => ['required'],
                'laterality'             => ['required'],
                'district'               => ['required'],
                'canton'                 => ['required'],
                'category'               => ['required'],
                'policy'                 => ['required','min:3', 'max:10'],
                'name_manager'           => ['min:3', 'max:15'],
                'lastname_manager'       => ['min:3', 'max:15'],
                'manager'                => ['min:3', 'max:15'],
                'identification_manager' => ['min:9', 'max:15'],
                'contact_manager'        => ['digits:8'],
                'url'                    => ['required']

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
        $sports = Sport::all();

        $genders = config('general.genders');

        $districts = config('general.districts');
        dd($districts);

        $bloods = config('general.bloods');

        $categories = config('general.categories');

        $lateralities = config('general.lateralities');

        $relationships = config('general.relationships');
        //Envia por correo el Id y el password del usuario
        $id = $data['identification'];
        $password = $data['password'];
        $email = $data['email'];
        //Sending an email with the password and the identification
        Mail::to($email)->send(new CredentialsMail($id, $password));
        $data['role_id'] = 4;
        $data['state'] = 'R';

        //$this->view('auth.register', compact('sports', 'users', 'genders', 'districts', 'bloods', 'lateralities', 'categories', 'relationships'));
        return User::create($data);
    }
}
