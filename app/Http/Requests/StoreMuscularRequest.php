<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMuscularRequest extends FormRequest
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
            'physiological_age'=> ['required','min:1', 'max:3', 'numeric'],
            'weight'           => ['required','min:1', 'max:3', 'numeric'],
            'height'           => ['required','min:1', 'max:3', 'numeric'],
            'bmi'              => ['required','min:1', 'max:3', 'numeric'],
            'waist'            => ['required','min:1', 'max:3', 'numeric'],
            'hip'              => ['required','min:1', 'max:3', 'numeric'],
            'cint_code'        => ['required','min:1', 'max:3', 'numeric'],
            'tricipital'       => ['required','min:1', 'max:3', 'numeric'],
            'subscapular'      => ['required','min:1', 'max:3', 'numeric'],
            'abdominal'        => ['required','min:1', 'max:3', 'numeric'],
            'suprailiac'       => ['required','min:1', 'max:3', 'numeric'],
            'thigh'            => ['required','min:1', 'max:3', 'numeric'],
            'calf'             => ['required','min:1', 'max:3', 'numeric'],
            'wrist'            => ['required','min:1', 'max:3', 'numeric'],
            'elbow'            => ['required','min:1', 'max:3', 'numeric'],
            'knee'             => ['required','min:1', 'max:3', 'numeric'],
            'biceps'           => ['required','min:1', 'max:3', 'numeric'],
            'calf_cm'          => ['required','min:1', 'max:3', 'numeric'],
            'calories'         => ['required','min:1', 'max:3', 'numeric'],
            'bmi_high'         => ['required','min:1', 'max:3', 'numeric'],
            'icc_high'         => ['required','min:1', 'max:3', 'numeric'],
            'fat'              => ['required','min:1', 'max:3', 'numeric'],
            'residual'         => ['required','min:1', 'max:3', 'numeric'],
            'bone'             => ['required','min:1', 'max:3', 'numeric'],
            'muscle'           => ['required','min:1', 'max:3', 'numeric'],
            'visceral'         => ['required','min:1', 'max:3', 'numeric'],
            'ideal_weight'     => ['required','min:1', 'max:3', 'numeric'],
            'get_better'       => ['required'],
            'details'          => ['required']
        ];

        return $rules;
    }
}
