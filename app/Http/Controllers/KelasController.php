<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kelas;
use App\Models\Guru;
use App\Http\Requests\kelasRequest;
use App\Models\jadwal_kelas;
use App\Models\Matpel;
use App\Models\role_matpel;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use Session;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        Session()->forget('add_kelas');
        Session()->forget('add_guru');
        Session()->forget('add_siswa');
        $title = 'Kelas';
        $guru = guru::all();
        $query = Kelas::join('gurus','gurus.id_guru','=','kelas.id_guru');
        if (Input::has('cari_nama')) {
            $query->where('kelas.nama_kelas','like','%'.Input::get('cari_nama').'%');
        }
        if (Input::has('cari_guru')) {
            $query->where('kelas.id_guru','=',Input::get('cari_guru'));
        }
        $data = $query->orderBy('nama_kelas', 'asc')->paginate(15);

        return view('kelas.index', compact('title', 'data','guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $data['title'] = "Tambah Kelas";
        $data['guru'] = guru::drop_options();
        $guru = guru::orderBy('nama_guru', 'asc')->get();
        $data['tingkat'] = Helper::tingkat();
        $data['status'] = Helper::status();
        if (count($guru) == 0) {
            Session::put('add_kelas','Tambah Guru terlebih dahulu');
            return redirect()->route('guru.add');
        }
        return view('kelas.create',$data);
    }

    public function store(kelasRequest $request)
    {
        $data = kelas::create($request->all());
        if (Session::get('add_siswa') != null) {
            Session()->forget('add_siswa');
            return redirect()->route('siswa.add');
        }
        return redirect()->route('jadwal.show', $data->id_kelas);
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $data['title'] = "Edit Kelas";
        $data['guru'] = guru::drop_options();
        $data['tingkat'] = Helper::tingkat();
        $data['status'] = Helper::status();
        $data['query'] = kelas::find($id);
        return view('kelas.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'nama_kelas' => 'required',
            'aktif' => 'required' 
        );
        $this->validate($request,$rules);
        $data = kelas::find($id)->update($request->all());
        return redirect('kelas');
    }

    public function jadwal($id)
    {
        $kelas = kelas::join('gurus','gurus.id_guru','=','kelas.id_guru')->where('kelas.id_kelas','=',$id)->first();
        $title = "Jadwal kelas : ".$kelas->tingkat."-".$kelas->nama_kelas." (".$kelas->nama_guru.")";
        $data =  jadwal_kelas::join('gurus','gurus.id_guru','=','jadwal_kelas.id_guru')
                                        ->join('matpels','matpels.id_matpel','=','gurus.id_matpel')
                                        ->where('jadwal_kelas.id_kelas','=',$id)->get();
        $id = $kelas->id_kelas;
        return  view('kelas.jadwal', compact('data','title','id'));
    }

    public function tambahJadwal($id)
    {
        $kelas = kelas::find($id);
        $title = "Tambah Jadwal kelas : ".$kelas->tingkat."-".$kelas->nama_kelas;
        $matpel = matpel::join('role_matpels','role_matpels.id_matpel','=','matpels.id_matpel')
                        ->where('role_matpels.tingkat','=',$kelas->tingkat)->get();
        return view('kelas.add_jadwal',compact('matpel','kelas','title'));
    }

    public function postJadwal(Request $request,$id)
    {
        $rules = array(
            'hari' => 'required',
            'id_guru' => 'required',
            'mata_pelajaran' => 'required',
        );
        $this->validate($request,$rules);
        $data = jadwal_kelas::create($request->all());
         return redirect()->route('jadwal.show',$id);
    }
    public function deleteJadwal($id)
    {
        $jadwal = jadwal_kelas::find($id);
        $id_kelas = $jadwal->id_kelas;
        $jadwal->delete();
        return redirect()->route('jadwal.show',$id_kelas);
    }

    public function ajaxGuru($id){
        $guru = guru::where('id_matpel','=',$id)->lists("id_guru","nama_guru");
        return json_encode($guru);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
