<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kelas;
use App\Models\Guru;
use App\Models\siswa;
use App\Models\User;
use App\Models\matpel;
use App\Models\transaksi_nilai;
use Auth, PDF, DB;
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
            $query->where('transaksi_nilais.kelas','=',Input::get('cari_kelas'));
        }  
        if (Input::has('cari_angkatan')) {
            $query->where('transaksi_nilais.angkatan','=',Input::get('cari_angkatan'));
        }        
        $data = $query->paginate(15);
        return view('nilai.index', compact('title', 'data','kelas'));
    }

    public function add($id,$semester)
    {
    	$data['query']= Siswa::join('kelas','kelas.id_kelas','=','siswas.id_kelas')->where('siswas.id_siswa','=',$id)->first();
        $data['semester'] = $semester;
        $data['status'] = "aktif";
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
        $siswa = siswa::join("kelas",'kelas.id_kelas','=','siswas.id_kelas')->where('siswas.id_siswa','=',$id)->first();
        $data['nilai'] = null;
        if (Input::has('semester')){
            $semester = input::get('semester');
            if ($semester == 1 OR $semester == 2) {
                $tingkat = 1;
            }
            elseif ($semester == 3 OR $semester == 4) {
                $tingkat = 2;
            }
            elseif ($semester == 5 OR $semester == 6) {
                $tingkat = 3;
            }
            elseif ($semester == 7 OR $semester == 8) {
                $tingkat = 4;
            }
            elseif ($semester == 9 OR $semester == 10) {
                $tingkat = 5;
            }
            elseif ($semester == 11 OR $semester == 12) {
                $tingkat = 6;
            }
            if ($tingkat == $siswa->tingkat) {
                $status = "aktif";
            }
            else{
                $status = "tidak";
            }
            $data['status'] = $status;
            $data['nilai'] = transaksi_nilai::join('gurus','gurus.id_guru','=','transaksi_nilais.id_guru')->where('transaksi_nilais.no_induk_siswa','=',$siswa->no_induk_siswa)->where('transaksi_nilais.semester','=',$semester)->where('transaksi_nilais.angkatan','=',$siswa->angkatan_tahun)->where('transaksi_nilais.status','=',$status)->get();
            $data['tingkat'] = $tingkat;
            $data['matpel'] = matpel::join('role_matpels','role_matpels.id_matpel','=','matpels.id_matpel')
                            ->where('role_matpels.tingkat','=',$tingkat)->get();
        }
            $data['siswa'] = siswa::join("kelas",'kelas.id_kelas','=','siswas.id_kelas')->where('siswas.no_induk_siswa','=',$siswa->no_induk_siswa)->first();
        return view('nilai.show', $data);
    }

    public function pdf(Request $request,$id,$semester)
    {
        $data['catatan'] = $request->input('catatan');
        $data['hasil'] = $request->input('status');
        $data['title'] = 'Raport Siswa';
        $data['siswa'] = siswa::join("kelas",'kelas.id_kelas','=','siswas.id_kelas')->where('siswas.no_induk_siswa','=',$id)->first();
        $data['semester'] = $semester;
        if ($semester == 1 || $semester == 2) {
            $tingkat = 1;
        }
        elseif ($semester == 3 || $semester == 4) {
            $tingkat = 2;
        }
        elseif ($semester == 5 || $semester == 6) {
            $tingkat = 3;
        }
        elseif ($semester == 7 || $semester == 8) {
            $tingkat = 4;
        }
        elseif ($semester == 9 || $semester == 10) {
            $tingkat = 5;
        }
        elseif ($semester == 11 || $semester == 12) {
            $tingkat = 6;
        }
        $data['tingkat'] = $tingkat;
        $data['matpel'] = matpel::join('role_matpels','role_matpels.id_matpel','=','matpels.id_matpel')
                            ->where('role_matpels.tingkat','=',$tingkat)->get();
        if ($tingkat == $data['siswa']->tingkat) {
            $status = "aktif";
            $data['all'] = siswa::where('id_kelas','=',$data['siswa']->id_kelas)->get();
            $data['kelas'] = $data['siswa']->tingkat."-".$data['siswa']->nama_kelas;
        }
        else{
            $status = "tidak";
            $nilais = transaksi_nilai::where('semester','=',$semester)->where('angkatan','=',$data['siswa']->angkatan_tahun)->where('no_induk_siswa','=',$id)->where('status','=',$status)->first();
            $data['all'] = transaksi_nilai::where('kelas','=',$nilais->kelas)->groupBy('no_induk_siswa')->where('status','=',$status)->get();
            $data['kelas']=$nilais->kelas;
        }

        $data['status'] = $status;
        $data['nilai'] = transaksi_nilai::join('gurus','gurus.id_guru','=','transaksi_nilais.id_guru')->where('transaksi_nilais.no_induk_siswa','=',$id)->where('transaksi_nilais.semester','=',$semester)->where('transaksi_nilais.angkatan','=',$data['siswa']->angkatan_tahun)->where('transaksi_nilais.status','=',$status)->get();
        $dia = DB::table('transaksi_nilais')->where('transaksi_nilais.status','=',$status)->join('siswas','siswas.no_induk_siswa','=','transaksi_nilais.no_induk_siswa')->where('transaksi_nilais.semester','=',$semester)->where('transaksi_nilais.no_induk_siswa','=',$id)->where('transaksi_nilais.kelas','=',$data['nilai'][0]->kelas)->select(DB::raw('sum(transaksi_nilais.nilai_tugas)+sum(transaksi_nilais.nilai_absensi)+sum(transaksi_nilais.nilai_uts)+sum(transaksi_nilais.nilai_uas) as total'))->first();

        $semua = DB::table('transaksi_nilais')->join('siswas','siswas.no_induk_siswa','=','transaksi_nilais.no_induk_siswa')->where('transaksi_nilais.semester','=',$semester)->where('transaksi_nilais.status','=',$status)->where('transaksi_nilais.kelas','=',$data['nilai'][0]->kelas)->select(DB::raw('siswas.no_induk_siswa ,sum(transaksi_nilais.nilai_tugas)+sum(transaksi_nilais.nilai_absensi)+sum(transaksi_nilais.nilai_uts)+sum(transaksi_nilais.nilai_uas) as total'))->groupBy('no_induk_siswa')->orderBy('total','DESC')->get();

        if ($dia->total == null) {
                $data['ranking'] = 0;
        }
        else{
            $ranking = 0;
            foreach ($semua as $key) {
                $ranking++;
                if ($dia->total == $key->total) {
                    $data['ranking'] = $ranking;
                    break;
                }
            }
        }
        $data['guru'] = guru::where('id_guru','=',Auth::user()->user_id)->first();
        $pdf = PDF::loadView('Nilai.pdf', $data);
        return $pdf->stream('Laporan-Nilai-Siswa_'.$data['siswa']->nama_siswa.'.pdf');
    }
}
