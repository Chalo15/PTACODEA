<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        $array = [
            'identification'  => ['required'],
            'name'            => ['required'],
            'last_name'       => ['required'],
            'birthdate'       => ['required'],
            'phone'           => ['required'],
            'province'        => ['required'],
            'city'            => ['required'],
            'email'           => ['required', 'email'],
            'phone'           => ['required'],
            'address'         => ['required'],
            'gender'          => ['required'],
            'experience'      => ['required'],
            'contract_number' => ['required'],
            'contract_year'   => ['required'],
            'role_id'         => ['required'],
            'password'        => ['required', 'confirmed']
        ];

        if ($this->role_id == 2) {
            $array['sport_id'] = ['required'];

            // Teléfono de habitación
        }

        return $array;
    }
}
