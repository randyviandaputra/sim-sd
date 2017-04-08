<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class siswaRequest extends Request
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
            'id_kelas' => 'required',
            'nama_siswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
            'agama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'id_kelas.required' => 'Mata Pelajaran wajib di pilih',
            'nama_siswa.required' => 'Nama tidak boleh kosong.',
            'tempat_lahir.required' => 'tempat lahir tidak boleh kosong',
            'tanggal_lahir.required' => 'tanggal lahir tidak boleh kosong',
            'jenis_kelamin.required' => 'jenis kelamin wajib di isi',
            'golongan_darah.required' => 'Golongan darah wajib di pilih',
            'alamat.required' => 'alamat tidak boleh kosong',
            'agama.required' => 'agama tidak boleh kosong',
            'telepon.required' => 'telepon tidak boleh kosong',
            'telepon.numeric' => 'Nomor Telepon tidak boleh string',
            'username.required' => 'username tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong',
            'username.unique' => 'username sudah terdaftar',


        ];
    }
}
