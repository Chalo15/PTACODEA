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
            'time'             => ['required'],
            'physiological_age'=> ['required','min:1', 'max:2'],
            'weight'           => ['required','min:2', 'max:5'],
            'height'           => ['required','min:2', 'max:5'],
            'bmi'              => ['required','min:1', 'max:5'],
            'waist'            => ['required','min:2', 'max:5'],
            'hip'              => ['required','min:2', 'max:5'],
            'cint_code'        => ['required','min:2', 'max:5'],
            'tricipital'       => ['required','min:2', 'max:5'],
            'subscapular'      => ['required','min:2', 'max:5'],
            'abdominal'        => ['required','min:2', 'max:5'],
            'suprailiac'       => ['required','min:2', 'max:5'],
            'thigh'            => ['required','min:2', 'max:5'],
            'calf'             => ['required','min:2', 'max:5'],
            'wrist'            => ['required','min:2', 'max:5'],
            'elbow'            => ['required','min:2', 'max:5'],
            'knee'             => ['required','min:2', 'max:5'],
            'biceps'           => ['required','min:2', 'max:5'],
            'calf_cm'          => ['required','min:2', 'max:5'],
            'calories'         => ['required','min:1', 'max:5'],
            'bmi_high'         => ['required','min:1', 'max:5'],
            'icc_high'         => ['required','min:1', 'max:5'],
            'fat'              => ['required','min:1', 'max:5'],
            'residual'         => ['required','min:1', 'max:5'],
            'bone'             => ['required','min:1', 'max:5'],
            'muscle'           => ['required','min:1', 'max:5'],
            'visceral'         => ['required','min:1', 'max:5'],
            'ideal_weight'     => ['required','min:1', 'max:5'],
            'get_better'       => ['required'],
            'details'          => ['required']
        ];

        return $rules;
    }
}
