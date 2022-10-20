<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PMarkat extends FormRequest
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

            'type' => ['bail','required', 'string', 'max:255'],
            'city' => ['bail','required', 'string', 'max:255'],

            'rooms' => ['bail', 'required','integer'],
            'baths' => ['bail', 'required','integer'],
            'price' => ['bail', 'required','integer'],
            
            'details' => ['bail','required', 'string'],

        ];
    }
}
