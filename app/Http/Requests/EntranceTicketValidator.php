<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntranceTicketValidator extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'nama_tiket_masuk' => 'required',
            'harga_tiket_masuk' => 'required',
            'tipe_tiket' => ''
        ];
    }

    public function attributes()
    {
        return [
          'nama_tiket_masuk',
          'harga_tiket_masuk'
        ];
    }

    public function messages()
    {
        return [
          'nama_tiket_masuk.required' => 'Nama tiket masuk dibutuhkan'
        ];
    }

}
