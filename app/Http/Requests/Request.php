<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
	public function messages()
    {
        return [
                    'nilai_tugas.requred' => 'nilai tugas tidak boleh kosong',
                    'nilai_absensi.requred' => 'nilai absensi tidak boleh kosong',
                    'nilai_uts.requred' => 'nilai uts tidak boleh kosong',
                    'nilai_uas.requred' => 'nilai uas tidak boleh kosong',
                    'nilai_tugas.numeric' => 'nilai tugas tidak boleh string',
                    'nilai_absensi.numeric' => 'nilai absensi tidak boleh string',
                    'nilai_uts.numeric' => 'nilai uts tidak boleh string',
                    'nilai_uas.numeric' => 'nilai uas tidak boleh string',
        ];
    }
}
