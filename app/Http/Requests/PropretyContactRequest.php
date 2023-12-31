<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropretyContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname'=>['required','string','min:2'],
            'lastname'=>['required','string','min:2'],
            'email'=>['required','email','min:4'],
            'phone'=>['required','string'],
            'message'=>['required','string','min:4'],
        ];
    }
}
