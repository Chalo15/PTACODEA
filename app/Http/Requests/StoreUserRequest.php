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
        $rules = [
            'identification'  => ['required', 'unique:users,identification'],
            'name'            => ['required'],
            'last_name'       => ['required'],
            'birthdate'       => ['required'],
            'province'        => ['required'],
            'city'            => ['required'],
            'email'           => ['required', 'email', 'unique:users,email'],
            'phone'           => ['required', 'numeric', 'unique:users,phone'],
            'address'         => ['required'],
            'gender'          => ['required'],
            'experience'      => ['required'],
            'contract_number' => ['required'],
            'contract_year'   => ['required'],
            'role_id'         => ['required', 'numeric', 'exists:roles,id'],
            'password'        => ['nullable', 'confirmed']
        ];

        if ($this->role_id == 2) {
            $rules += [
                'sport_id'    => ['required'],
                'other_phone' => ['required'],
                'pdf'         => ['required', 'file', 'mimes:pdf']
            ];
        }

        return $rules;
    }
}
