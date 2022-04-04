<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'identification'  => ['min:9', 'max:15','required', 'unique:users,identification,' . $this->user->id],
            'name'            => ['required'],
            'last_name'       => ['required'],
            'birthdate'       => ['required'],
            'province'        => ['required'],
            'city'            => ['required'],
            'email'           => ['required', 'email', 'unique:users,email,' . $this->user->id],
            'phone'           => ['required', 'numeric', 'min:11111111', 'max:99999999', 'unique:users,phone,' . $this->user->id],
            'address'         => ['required'],
            'gender'          => ['required'],
            'experience'      => ['required'],
            'contract_number' => ['required','numeric', 'max:3'],
            'contract_year'   => ['required','numeric', 'max:3'],
            'role_id'         => ['required', 'numeric', 'exists:roles,id'],
            'password'        => ['nullable', 'confirmed']
        ];

        if ($this->role_id == 2) {
            $array['sport_id'] = ['required'];

            // Teléfono de habitación
        }

        return $array;
    }
}
