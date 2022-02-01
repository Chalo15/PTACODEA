<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class   UpdateAthleteRequest extends FormRequest
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
            'identification'  => ['unique:users,identification,' . $this->athlete->user->id],
            'name'            => ['required'],
            'last_name'       => ['required'],
            'birthdate'       => ['required'],
            'province'        => ['required'],
            'city'            => ['required'],
            'email'           => ['required', 'email', 'unique:users,email,' . $this->athlete->user->id],
            'phone'           => ['required', 'numeric', 'unique:users,phone,' . $this->athlete->user->id],
            'address'         => ['required'],
            'gender'          => ['required'],
            'password'        => ['nullable', 'confirmed'],
            'sport_id'        => ['required'],
            'blood'           => ['required'],
            'laterality'      => ['required']
        ];

        if ($this->is_younger) {
            $rules += [
                'name_manager'           => ['required'],
                'lastname_manager'       => ['required'],
                'manager'                => ['required'],
                'identification_manager' => ['required'],
                'contact_manager'        => ['required'],
                'policy'                 => ['required'],
                'pdf'                    => ['nullable']
            ];
        }

        return $rules;
    }
}
