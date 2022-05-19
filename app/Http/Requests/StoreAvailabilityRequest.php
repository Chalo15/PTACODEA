<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAvailabilityRequest extends FormRequest
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
            'date'  => ['required'],
            'start' => ['required'],
            'end'   => ['required'],
            'state' => ['required']
        ];
        if ($this->is_not_all_book) {
            $rules += [
            'start' => ['required'],
            'end' => ['required'],
            ];
            return $rules;
        }
        if ($this->is_all_book) {
            $rules += [
            'start' => ['required'],
            'end' => ['required'],
            ];
            return $rules;
        }
    }
}
