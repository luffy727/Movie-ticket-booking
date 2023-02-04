<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
        $rules =  [
            'mname' => [
                'required',
                'string',
            ],

            'mtype' => [
                'required',
            ],

            'mdescription' => [
                'required',
                'string',
            ],

            'hall' => [
                'required',
                'string',
            ],

            'chticket_price' => [
                'required',
                'numeric',
            ],

            'adticket_price' => [
                'required',
                'numeric',
            ],

            'seat_qty' => [
                'required',
                'numeric',
            ],

            'trending' => [
                'required',
            ],

            'image' => [
                'required',
                'image',
            ],

        ];

        return $rules;
    }

    public function messages()
    {
        return[
            'mname.required' => 'Please Enter the Movie name',
            'mtype.required' => 'Please Enter the Movie type',
            'mdescription.required' => 'Please Enter the Movie description',
            'hall.required' => 'Please Enter the Movie hall',
            'chticket_price.required' => 'Please Enter the Movie Ticket Price',
            'adticket_price.required' => 'Please Enter the Movie Ticket Price',
            'seat_qty.required' => 'Please Enter the Number of seats',
            'trending.required' => 'Please click the trending  ',
            'image.required' => 'Please Attached a image',
 
        ];
    }
}
