<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMuscularsRequest extends FormRequest
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
            'user_id'          => ['required'],
            'athlete_id'       => ['required'],
            'date'             => ['required'],
            'physiological_age'=> ['required', 'numeric'],
            'weight'           => ['required', 'numeric'],
            'height'           => ['required', 'numeric'],
            'BMI'              => ['required', 'numeric'],
            'waist'            => ['required', 'numeric'],
            'hip'              => ['required', 'numeric'],
            'cint_code'        => ['required', 'numeric'],
            'tricipital'       => ['required', 'numeric'],
            'subscapular'      => ['required', 'numeric'],
            'abdominal'        => ['required', 'numeric'],
            'suprailiac'       => ['required', 'numeric'],
            'thigh'            => ['required', 'numeric'],
            'calf'             => ['required', 'numeric'],
            'wrist'            => ['required', 'numeric'],
            'elbow'            => ['required', 'numeric'],
            'knee'             => ['required', 'numeric'],
            'biceps'           => ['required', 'numeric'],
            'calf_cm'          => ['required', 'numeric'],
            'calories'         => ['required', 'numeric'],
            'BMI_high'         => ['required', 'numeric'],
            'icc_high'         => ['required', 'numeric'],
            'fat'              => ['required', 'numeric'],
            'residual'         => ['required', 'numeric'],
            'bone'             => ['required', 'numeric'],
            'muscle'           => ['required', 'numeric'],
            'visceral'         => ['required', 'numeric'],
            'ideal_weight'     => ['required', 'numeric'],
            'get_better'       => ['required'],
            'details'          => ['required']
        ];

        return $rules;
    }
}
