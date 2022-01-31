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
            'sport_id'   => ['required'],
            'blood'      => ['required'],
            'laterality' => ['required']
        ];

        if ($this->is_user) {
            $rules += [
                'user_id' => ['required']
            ];
        } else {
            $rules += [
                'identification'  => ['required', 'unique:users'],
                'name'            => ['required'],
                'last_name'       => ['required'],
                'birthdate'       => ['required'],
                'phone'           => ['required', 'numeric', 'unique:users,phone'],
                'province'        => ['required'],
                'city'            => ['required'],
                'email'           => ['required', 'email', 'unique:users'],
                'address'         => ['required'],
                'gender'          => ['required'],
                'password'        => ['required', 'confirmed']
            ];
        }

        if ($this->is_younger) {
            $rules += [
                'name_manager'           => ['required'],
                'lastname_manager'       => ['required'],
                'manager'                => ['required'],
                'identification_manager' => ['required'],
                'contact_manager'        => ['required'],
                'policy'                 => ['required'],
                'url'                    => ['required']
            ];
        }

        return $rules;
    }
}
