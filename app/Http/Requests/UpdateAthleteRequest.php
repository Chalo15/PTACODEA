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
            'coach_id'   => ['required'],
            'identification'  => ['unique:users,identification,' . $this->athlete->user->id],
            'name'            => ['required','min:3', 'max:30'],
            'last_name'       => ['required','min:3', 'max:30'],
            'birthdate'       => ['required'],
            'province'        => ['required'],
            'city'            => ['required','min:3', 'max:30'],
            'email'           => ['required', 'email', 'unique:users,email,' . $this->athlete->user->id],
            'phone'           => ['required', 'numeric', 'unique:users,phone,' . $this->athlete->user->id],
            'address'         => ['required','min:3', 'max:100'],
            'gender'          => ['required'],
            'password'        => ['nullable', 'confirmed'],
            'blood'           => ['required'],
            'laterality'      => ['required']
        ];

        if ($this->is_younger) {
            $rules += [
                'name_manager'           => ['required', 'min:3', 'max:15'],
                'lastname_manager'       => ['required','min:3', 'max:15'],
                'manager'                => ['required'],
                'identification_manager' => ['required', 'min:9', 'max:15'],
                'contact_manager'        => ['required','digits:8'],
                'policy'                 => ['required','min:3', 'max:10'],
                'pdf'                    => ['required']
            ];
        }

        return $rules;
    }
}
