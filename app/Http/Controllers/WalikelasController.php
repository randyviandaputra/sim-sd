<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guru;
use App\Models\User;
use App\Models\matpel;
use App\Models\kelas;
use App\Models\siswa;
use App\Http\Requests;
use Auth;

class WalikelasController extends Controller
{
    public function index()
    {
    	$data['kelas'] = kelas::where('id_guru',Auth::user()->user_id)->get();
    	$data['title'] = "Wali Kelas : ".$data['kelas'][0]['tingkat']."-".$data['kelas'][0]['nama_kelas'];
    	$data['data'] = siswa::join('kelas','kelas.id_kelas','=','siswas.id_kelas')->where('siswas.id_kelas','=',$data['kelas'][0]['id_kelas'])->paginate(15);
    	return view('siswa.index', $data);
    }
}
