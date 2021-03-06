<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCustomerCreateRequest extends FormRequest
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
            'password' => 'required|min:5|max:20',
            'mobile' => 'required|digits_between:8,15',
            'icn' => 'required|digits_between:8,15'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'This field is required!'
        ];
    }
}
