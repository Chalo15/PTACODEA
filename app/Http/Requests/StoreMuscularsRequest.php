<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAthleteRequest extends FormRequest
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
            'date'             => ['required'],
            'calcification'    => ['required'],
            'physiological_age' => ['required'],
            'weight'           => ['required'],
            'height'           => ['required'],
            'bmi'              => ['required'],
            'waist'            => ['required'],
            'hip'              => ['required'],
            'cint'             => ['required', 'numeric'],
            'tricipital'       => ['required'],
            'subscapular'      => ['required'],
            'abdominal'        => ['required'],
            'suprailiac'       => ['required'],
            'thigh'            => ['required'],
            'calf'             => ['required'],
            'wrist'            => ['required', 'numeric'],
            'elbow'            => ['required'],
            'knee'             => ['required'],
            'biceps'           => ['required'],
            'calf_cm'          => ['required'],
            'calories'         => ['required'],
            'BMI_high'         => ['required'],
            'icc_high'         => ['required', 'numeric'],
            'fat'              => ['required'],
            'residual'         => ['required'],
            'bone'             => ['required'],
            'muscle'           => ['required'],
            'visceral'         => ['required'],
            'ideal_weight'     => ['required'],
            'get_better'       => ['required'],
            'details'          => ['required']
        ];

        return $rules;
    }
}
