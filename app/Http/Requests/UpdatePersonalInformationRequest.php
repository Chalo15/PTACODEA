<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalInformationRequest extends FormRequest
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
        return [
            'identification'  => ['required'],
            'name'            => ['required'],
            'last_name'       => ['required'],
            'birthdate'       => ['required'],
            'phone'           => ['required'],
            'province'        => ['required'],
            'city'            => ['required'],
            'email'           => ['required', 'email'],
            'address'         => ['required'],
            'gender'          => ['required'],
        ];
    }
}
