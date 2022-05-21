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
            'identification'  => ['required', 'min:9', 'max:15', 'unique:users,identification'],
            'name'            => ['required','min:3', 'max:30'],
            'last_name'       => ['required','min:3', 'max:30'],
            'birthdate'       => ['required'],
            'canton'          => ['required'],
            'district'        => ['required', 'min:3', 'max:30'],
            'email'           => ['required', 'email', 'unique:users,email'],
            'phone'           => ['required', 'digits:8','numeric', 'unique:users,phone'],
            'address'         => ['required', 'min:3', 'max:100'],
            'gender'          => ['required'],
            'experience'      => ['required', 'min:1', 'max:2'],
            'contract_number' => ['required', 'min:1', 'max:5'],
            'contract_year'   => ['required', 'min:1', 'max:2'],
            'role_id'         => ['required', 'numeric', 'exists:roles,id'],
            'password'        => ['nullable', 'confirmed']
        ];

        if ($this->role_id == 2) {
            $rules += [
                'sport_id'    => ['required'],
                'other_phone' => ['required', 'digits:8'],
                'pdf'         => ['required', 'file', 'mimes:pdf']
            ];
        }

        return $rules;
    }
}
