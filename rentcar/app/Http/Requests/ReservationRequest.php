<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'idCar' => 'required|integer',
            'idCustomer' => 'required|integer',
            'pLocation' => 'required|integer',
            'pDate' => 'required|date|date_format:Y/m/d',
            'rLocation' => 'required|integer',
            'rDate' => 'required|date|date_format:Y/m/d|after:pDate',
            'description' => 'nullable'
        ];

    }

    public function messages(){
        return [
            'required' => 'Field is required!'
        ];
    }
}
