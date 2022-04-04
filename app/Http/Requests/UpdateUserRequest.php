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
            'phone'           => ['required', 'unique:users,phone,' . $this->user->id],
            'province'        => ['required'],
            'city'            => ['required'],
            'email'           => ['required', 'email', 'unique:users,email,' . $this->user->id],
            'phone'           => ['required'],
            'address'         => ['required'],
            'gender'          => ['required'],
            'experience'      => ['required'],
            'contract_number' => ['required'],
            'contract_year'   => ['required'],
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
