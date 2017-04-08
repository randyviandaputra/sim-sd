<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kelas;
use App\Models\Guru;
use App\Models\siswa;
use App\Models\User;
use App\Models\matpel;
use App\Models\transaksi_nilai;
use Auth, PDF;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class NilaiController extends Controller
{
    public function index()
    {
        $title = 'Nilai';
        $kelas = kelas::all();
        $query = transaksi_nilai::join('gurus','gurus.id_guru','=','transaksi_nilais.id_guru')
                                ->join('matpels','gurus.id_matpel','=','matpels.id_matpel')
                                ->join('siswas','siswas.no_induk_siswa','=','transaksi_nilais.no_induk_siswa')
                                ->join('kelas','kelas.id_kelas','=','siswas.id_kelas')
                                ->where('transaksi_nilais.id_guru','=',Auth::user()->user_id);
        if (Input::has('cari_nis')){
            $query->where('siswas.no_induk_siswa','like','%'.Input::get('cari_nis').'%');
        }
        if (Input::has('cari_nama')) {
            $query->where('siswas.nama_siswa','like','%'.Input::get('cari_nama').'%');
        }
        if (Input::has('cari_kelas')) {
            $query->where('siswas.id_kelas','=',Input::get('cari_kelas'));
        }        
        $data = $query->paginate(15);
        return view('nilai.index', compact('title', 'data','kelas'));
    }

    public function add($id,$semester)
    {
    	$data['query']= Siswa::join('kelas','kelas.id_kelas','=','siswas.id_kelas')->where('siswas.id_siswa','=',$id)->first();
        $data['semester'] = $semester;
    	$data['guru'] = Guru::find(Auth::user()->user_id);
    	$data['matpel'] = matpel::find($data['guru']->id_matpel);
        return view('nilai.create', $data)->withTitle('Input Nilai');
        
    }

    public function store(Request $request)
    {
        $rules = array(
                    'nilai_tugas' => 'required|numeric',
                    'nilai_absensi'    => 'required|numeric',
                    'nilai_uts' => 'required|numeric',
                    'nilai_uas'    => 'required|numeric',
                  );

        $this->validate($request, $rules);
        $data = transaksi_nilai::create($request->except('nilai_rata_rata'));

        return redirect()->route('siswa.index');
    }

    public function edit($id,$semester)
    {
        $data['query'] = transaksi_nilai::join('siswas','siswas.no_induk_siswa','=','transaksi_nilais.no_induk_siswa')->join('kelas','kelas.id_kelas','=','siswas.id_kelas')->where('transaksi_nilais.id_nilai','=',$id)->first();
        $data['semester'] = $semester;
    	$data['guru'] = Guru::find(Auth::user()->user_id);
    	$data['matpel'] = matpel::find($data['guru']->id_matpel);
        return view('nilai.edit', $data)->withTitle('Edit Nilai');
    }

     public function update(Request $request, $id)
    {
        $rules = array(
                    'nilai_tugas' => 'required|numeric',
                    'nilai_absensi'    => 'required|numeric',
                    'nilai_uts' => 'required|numeric',
                    'nilai_uas'    => 'required|numeric',
                  );

        $this->validate($request, $rules);
        $data = transaksi_nilai::find($id);
        $data->update($request->except('nilai_rata_rata'));
        return redirect()->route('siswa.index');
    }

    public function show($id)
    {
        $data['title'] = 'Raport Siswa';
        $siswa = siswa::where('id_siswa','=',$id)->first();
        $data['nilai'] = null;
        if (Input::has('semester')){
            $data['nilai'] = transaksi_nilai::join('gurus','gurus.id_guru','=','transaksi_nilais.id_guru')->where('transaksi_nilais.no_induk_siswa','=',$siswa->no_induk_siswa)->where('transaksi_nilais.semester','=',input::get('semester'))->get();
        }
        $data['siswa'] = siswa::join("kelas",'kelas.id_kelas','=','siswas.id_kelas')->where('siswas.no_induk_siswa','=',$siswa->no_induk_siswa)->first();
        $data['matpel'] = matpel::all();
        return view('nilai.show', $data);
    }

    public function pdf($id,$semester)
    {
        $data['title'] = 'Raport Siswa';
        $data['siswa'] = siswa::join("kelas",'kelas.id_kelas','=','siswas.id_kelas')->where('siswas.no_induk_siswa','=',$id)->first();
        $data['semester'] = $semester;
        $data['nilai'] = transaksi_nilai::join('gurus','gurus.id_guru','=','transaksi_nilais.id_guru')->where('transaksi_nilais.no_induk_siswa','=',$id)->where('transaksi_nilais.semester','=',$semester)->get();
        $data['matpel'] = matpel::all();
        $pdf = PDF::loadView('Nilai.pdf', $data);
        return $pdf->stream('Laporan-Nilai-Siswa_'.$data['siswa']->nama_siswa.'.pdf');
    }
}
