<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guru;
use App\Models\User;
use App\Models\matpel;
use App\Models\kelas;
use App\Models\jadwal_kelas;
use App\Models\siswa;
use App\Http\Requests;
use Auth;

class WalikelasController extends Controller
{
    public function index()
    {
    	$data['kelasGuru'] = jadwal_kelas::join('kelas','kelas.id_kelas','=','jadwal_kelas.id_kelas')->where('jadwal_kelas.id_guru','=',Auth::user()->user_id)->groupBy('jadwal_kelas.id_kelas')->get();
    	$data['kelas'] = kelas::where('id_guru',Auth::user()->user_id)->get();
    	$data['title'] = "Wali Kelas : ".$data['kelas'][0]['tingkat']."-".$data['kelas'][0]['nama_kelas'];
    	$data['data'] = siswa::join('kelas','kelas.id_kelas','=','siswas.id_kelas')->where('siswas.id_kelas','=',$data['kelas'][0]['id_kelas'])->paginate(15);
        $data['kenaikan'] = kelas::where('tingkat','>',$data['kelas'][0]->tingkat)->get();
		$bulan = date("m");
        if ($bulan >= "07" AND $bulan <= "12") {
            $data['semester'] = "GANJIL";
        }
        else{
            $data['semester'] = "GENAP";
        }
    	return view('siswa.index', $data);
    }
}