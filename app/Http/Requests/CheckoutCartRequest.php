<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutCartRequest extends FormRequest
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
            'order_id' => 'required',
            'user_id' => 'required',
            'book_date' => 'required|date',
            'book_time' => 'required|date_format:H:i',
            'book_type' => [
                'required',
                Rule::in(['A','B','C'])
            ],
            'ticket_quantity' => 'integer',
            'pdf_url' => 'string|nullable'
        ];
    }

    public function attributes()
    {
        return [
            'order_id',
            'user_id',
            'book_date',
            'book_time',
            'book_type',
            'pdf_url'
        ];
    }

    public function messages()
    {
        return [
            'order_id',
            'user_id',
            'book_date',
            'book_time',
            'book_type.required' => 'Missing booking type',
            'pdf_url'
        ];
    }
}
