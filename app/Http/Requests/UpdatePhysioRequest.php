<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhysioRequest extends FormRequest
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
            'date'      => ['required'],
            'time'             => ['required'],
            'sph' => ['required'],
            'app' => ['required'],
            'treatment' => ['required'],
            'session_start' => ['required'],
            'session_end' => ['required'],
            'inability' => ['required'],
            'severity' => ['required'],
            'count_session' => ['required'],
            'details' => ['nullable']
        ];

        if ($this->is_surgeries) {
            $rules += [
                'surgeries'           => ['required']
            ];
        }

        if ($this->is_fractures) {
            $rules += [
                'fractures'           => ['required']
            ];
        }

        return $rules;
    }
}
