<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMuscularRequest extends FormRequest
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
            'weight'           => ['required','min:2', 'max:3'],
            'height'           => ['required','min:2', 'max:3'],
            'bmi'              => ['required','min:1', 'max:3'],
            'waist'            => ['required','min:2', 'max:3'],
            'hip'              => ['required','min:2', 'max:3'],
            'cint_code'        => ['required','min:2', 'max:3'],
            'tricipital'       => ['required','min:2', 'max:2'],
            'subscapular'      => ['required','min:2', 'max:2'],
            'abdominal'        => ['required','min:2', 'max:3'],
            'suprailiac'       => ['required','min:2', 'max:2'],
            'thigh'            => ['required','min:2', 'max:2'],
            'calf'             => ['required','min:2', 'max:2'],
            'wrist'            => ['required','min:2', 'max:2'],
            'elbow'            => ['required','min:2', 'max:2'],
            'knee'             => ['required','min:2', 'max:2'],
            'biceps'           => ['required','min:2', 'max:2'],
            'calf_cm'          => ['required','min:2', 'max:2'],
            'calories'         => ['required','min:2', 'max:4'],
            'bmi_high'         => ['required','min:1', 'max:3'],
            'icc_high'         => ['required','min:1', 'max:3'],
            'fat'              => ['required','min:1', 'max:2'],
            'residual'         => ['required','min:1', 'max:2'],
            'bone'             => ['required','min:1', 'max:2'],
            'muscle'           => ['required','min:1', 'max:2'],
            'visceral'         => ['required','min:1', 'max:2'],
            'ideal_weight'     => ['required','min:1', 'max:3'],
            'get_better'       => ['required'],
            'details'          => ['required']
        ];

        return $rules;
    }
}
