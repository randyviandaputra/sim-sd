<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class kelasRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         'nama_kelas' => 'required',
         'tingkat' => 'required',
         'id_guru' => 'required',
         'aktif' => 'required',
        ];
    }
     public function messages()
    {
        return [
         'nama_kelas.required' => 'Nama kelas tidak boleh kosong', 
         'tingkat.required' => 'Tingkat wajib di pilih',
         'aktif.required' => 'status wajib di pilih',
         'id_guru.required' => 'wali kelas wajib di isi',
        ];
    }
}
