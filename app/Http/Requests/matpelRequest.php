<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class matpelRequest extends Request
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
         'kode_matpel' => 'required',
         'nama_matpel' => 'required',
         'kkm' => 'required',
        ];
    }
     public function messages()
    {
        return [
         'kode_matpel.required' => 'Kode matpel tidak boleh kosong', 
         'nama_matpel.required' => 'Nama matpel tidak boleh kosong',
         'kkm.required' => 'kkm tidak boleh kosong',
        ];
    }
}
