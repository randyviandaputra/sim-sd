<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

class guruRequest extends Request
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
            'nama_guru' => 'required',
            'no_induk_guru' => 'required|unique:gurus',
            'id_matpel' => 'required',
            'alamat'    => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir'    => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama_guru.required' => 'Nama tidak boleh kosong.',
            'no_induk_guru.required' => 'No Induk tidak boleh kosong',
            'no_induk_guru.unique' => 'no induk telah terdaftar',
            'id_matpel.required' => 'Mata Pelajaran wajib di pilih',
            'alamat.required' => 'alamat tidak boleh kosong',
            'tempat_lahir.required' => 'tempat lahir tidak boleh kosong',
            'tanggal_lahir.required' => 'tanggal lahir tidak boleh kosong',
            'jenis_kelamin.required' => 'jenis kelamin wajib di isi',
            'username.required' => 'username tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong',
            'username.unique' => 'username sudah terdaftar',


        ];
    }
}
