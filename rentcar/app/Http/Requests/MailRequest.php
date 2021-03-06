<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            'fName' => 'required|min:3|max:10|alpha',
            'lName' => 'required|min:3|max:15|alpha',
            'email' => 'required|email',
            'body' => 'required|string'
        ];
    }


    public function messages()
    {
        return [
            'required' => 'This field is required!'
        ];
    }
}
