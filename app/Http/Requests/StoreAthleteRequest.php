<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAthleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            #'sport_id'   => ['required'],
            'blood'      => ['required'],
            'laterality' => ['required'],
            'category'   => ['required'],
            'policy'     => ['required','min:3', 'max:10'],
        ];

        if ($this->is_user) {
            $rules += [
                'user_id' => ['required']
            ];
        } else {
            $rules += [
                'identification'  => ['required', 'min:9', 'max:15', 'unique:users'],
                'name'            => ['required','min:3', 'max:30'],
                'last_name'       => ['required','min:3', 'max:30'],
                'birthdate'       => ['required'],
                'phone'           => ['required', 'digits:8','numeric', 'unique:users,phone'],
                'canton'          => ['required'],
                'district'        => ['required','min:3', 'max:30'],
                'email'           => ['required', 'email', 'unique:users'],
                'address'         => ['required','min:3', 'max:100'],
                'gender'          => ['required'],
                'password'        => ['required', 'confirmed'],
            ];
        }

        if ($this->is_younger) {
            $rules += [
                'name_manager'           => ['required', 'min:3', 'max:15'],
                'lastname_manager'       => ['required','min:3', 'max:15'],
                'manager'                => ['required'],
                'identification_manager' => ['required', 'min:9', 'max:15'],
                'contact_manager'        => ['required','digits:8'],
                'url'                    => ['required']
            ];
        }

        return $rules;
    }
}
