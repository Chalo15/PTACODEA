<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainingRequest extends FormRequest
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
            'athlete_id'       => ['required'],
            'date'             => ['required'],
            'type_training'    => ['required'],
            'calification'    =>  ['required'],
            'time'             => ['required'],
            'level'            => ['required'],
            'planification'    => ['required'],
            'lesion'           => ['required'],
            'get_better'       => ['required'],
            'details'          => ['required']
        ];

        return $rules;
    }
}
