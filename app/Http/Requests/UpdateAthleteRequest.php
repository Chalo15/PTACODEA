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
            'name'            => ['required','min:3', 'max:30'],
            'last_name'       => ['required','min:3', 'max:30'],
            'birthdate'       => ['required'],
            'canton'          => ['required'],
            'district'        => ['required','min:3', 'max:30'],
            'email'           => ['required', 'email', 'unique:users,email,' . $this->athlete->user->id],
            'phone'           => ['required', 'numeric', 'unique:users,phone,' . $this->athlete->user->id],
            'address'         => ['required','min:3', 'max:100'],
            'gender'          => ['required'],
            'category'        => ['required'],
            'blood'           => ['required'],
            'laterality'      => ['required'],
            'sport_id'      => ['required'],
            'policy'          => ['required','min:3', 'max:10']
        ];
        if ($this->is_edit) {
            $rules += [
                'password'        => ['required', 'confirmed']
            ];
        }

        if ($this->is_younger) {
            $rules += [
                'name_manager'           => ['required', 'min:3', 'max:30'],
                'lastname_manager'       => ['required','min:3', 'max:30'],
                'manager'                => ['required'],
                'identification_manager' => ['required', 'min:9', 'max:15'],
                'contact_manager'        => ['required','digits:8'],
                'pdf'                    => ['required']
            ];
        }

        return $rules;
    }
}
