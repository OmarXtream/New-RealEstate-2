<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'name' => ['bail','required', 'string', 'max:255'],
            'phone' => ['bail', 'required','integer'],
            'Age' => ['bail', 'required','integer'],

            'type' => ['bail', 'required','integer','between:1,3'],
            'commitments' => ['bail', 'required','integer'],

            'bank' => ['bail','required', 'string', 'max:255'],
            'salary' => ['bail', 'required','integer'],

            'supported' => ['bail', 'required','integer','between:1,2'],
            'notes' => ['bail','required', 'string'],

        ];
    }
}
