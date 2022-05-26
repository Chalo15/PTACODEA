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
            'name'            => ['required','min:3', 'max:30'],
            'last_name'       => ['required','min:3', 'max:30'],
            'birthdate'       => ['required'],
            'canton'          => ['required'],
            'district'        => ['required', 'min:3', 'max:30'],
            'email'           => ['required', 'email', 'unique:users,email,' . $this->user->id],
            'phone'           => ['required', 'digits:8', 'numeric', 'unique:users,phone,' . $this->user->id],
            'address'         => ['required', 'min:3', 'max:150'],
            'gender'          => ['required'],
            'state'       => ['required'],
            'experience'      => ['required', 'min:1', 'max:2'],
            'contract_number' => ['required', 'min:1', 'max:8'],
            'contract_year'   => ['required', 'min:1', 'max:2'],
            'role_id'         => ['required', 'numeric', 'exists:roles,id'],
            'password'        => ['required', 'confirmed']
        ];

        if ($this->role_id == 2) {
            $array += [
                'sport_id'    => ['required'],
                'other_phone' => ['required', 'digits:8'],
                'url'         => ['required']
            ];
        }

        return $array;
    }
}
