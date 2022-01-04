<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => [
                'required',
                Rule::in(['laki-laki','perempuan'])
            ],
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'nama_lengkap',
            'no_hp',
            'alamat',
            'jenis_kelamin',
            'tanggal_lahir',
            'tempat_lahir',
        ];
    }

    public function messages()
    {
        return [
            'nama_lengkap.required' => 'atribut :attribute tidak boleh kosong',
            'no_hp.required' => 'atribut :attribute tidak boleh kosong',
            'alamat.required' => 'atribut :attribute tidak boleh kosong',
            'jenis_kelamin.required' => 'atribut :attribute tidak boleh kosong',
            'tanggal_lahir.required' => 'atribut :attribute tidak boleh kosong',
            'tempat_lahir.required' => 'atribut :attribute tidak boleh kosong',
        ];
    }
}
