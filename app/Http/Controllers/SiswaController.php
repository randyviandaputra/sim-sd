<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kelas;
use App\Models\Guru;
use App\Models\siswa;
use App\Models\User;
use App\Models\matpel;
use App\Helpers\Helper;
use App\Models\jadwal_kelas;
use App\Models\transaksi_nilai;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\siswaRequest;
use App\Http\Requests;
use Auth;
use PDF;
use Session;

class SiswaController extends Controller
{
    
    public function index()
    {
        
        Session()->forget('add_kelas');
        Session()->forget('add_guru');
        Session()->forget('add_siswa');
        $data['title'] = 'Siswa';
        $data['menu'] = '';

        $data['kelas'] = kelas::all();
        $data['kelasGuru'] = jadwal_kelas::join('kelas','kelas.id_kelas','=','jadwal_kelas.id_kelas')->where('jadwal_kelas.id_guru','=',Auth::user()->user_id)->groupBy('jadwal_kelas.id_kelas')->get();
        $query = siswa::with('kelas')->orderBy('nama_siswa', 'asc');
        if (Auth::user()->level == 1) {
            if (count($data['kelasGuru']) == 0) {
               $query = siswa::with('kelas')->where('id_kelas','=',0)->orderBy('nama_siswa', 'asc');
            }
            else{
                $query = null;
            }
        }
        if (Input::has('cari_kelas')) {
            $query = siswa::with('kelas')->orderBy('nama_siswa', 'asc');
            $query->where('id_kelas','=',Input::get('cari_kelas'));
        }
        if (Input::has('cari_nama')) {
            $query->where('nama_siswa','like','%'.Input::get('cari_nama').'%');
        }
        if (Auth::user()->level == 1) {
            if (Input::has('cari_kelas')) {
                $data['data'] = $query->orderBy('nama_siswa', 'asc')->paginate(15);
            }
            else{
                $data['data'] = siswa::where('id_kelas','=',0)->paginate(15);
            }
        }
        else{
            
            $data['data'] = $query->orderBy('nama_siswa', 'asc')->paginate(15);
        }
        $bulan = date("m");
        if ($bulan >= "07" AND $bulan <= "12") {
            $data['semester'] = "GANJIL";
        }
        else{
            $data['semester'] = "GENAP";
        }
        return view('siswa.index', $data);
    }
    public function sampah()
    {
        $data['title'] = 'Siswa';
        $data['menu'] = 'sampah';

        $data['kelas'] = kelas::all();
        $query = siswa::onlyTrashed()->with('kelas')->orderBy('nama_siswa', 'asc');
        if (Input::has('cari_nama')) {
            $query->where('nama_siswa','like','%'.Input::get('cari_nama').'%');
        }
        if (Input::has('cari_kelas')) {
            $query->where('id_kelas','=',Input::get('cari_kelas'));
        }
        $data['data'] = $query->orderBy('nama_siswa', 'asc')->paginate(15);
         $bulan = date("m");
        if ($bulan >= "07" AND $bulan <= "12") {
            $data['semester'] = "GANJIL";
        }
        else{
            $data['semester'] = "GENAP";
        }
        return view('siswa.index', $data);
    }


    public function add()
    {
        $data['title'] = 'Tambah Siswa';

        $data['kelas'] = kelas::drop_options();
        $data['jenis_kelamin'] = Helper::jenis_kelamin();
        $data['golongan_darah'] = Helper::golongan_darah();
        $data['agama'] = Helper::agama();
        $data['kelass'] = kelas::orderBy('nama_kelas', 'asc')->get();
        if (count($data['kelass']) == 0) {
            Session::put('add_siswa', 'Tambah Kelas Terlebih dahulu');
            return redirect()->route('kelas.add');
        }
        return view('siswa.create', $data);
    }

  
    public function store(siswaRequest $request)
    {

        if (Input::hasFile('foto')) 
        {
            $file = $request->file('foto');
            $siswa = siswa::all();
            $fileName = $file->getClientOriginalName();
            $i=0;
            foreach ($siswa as $key) {
                if ($i.$fileName == $key['foto'] ) {
                    $i++;
                }
            }
            $namafoto = $i.$fileName;
            $request->file('foto')->move("image/siswa", $namafoto);

        }
        else
        {
            $namafoto = "default.png";
        }
        $bulan = date("m");
        if ($bulan >= "05" AND $bulan <= "12") {
            $termasuk = 0;
        }
        else{
            $termasuk = 1;
        }
        $kelas = kelas::find($request->input('id_kelas'));
        $kurang = $kelas->tingkat - 1;
        $tahun = date('Y')-$termasuk;
        $angkatan_tahun = $tahun - $kurang;

        $query = array(
            'id_kelas' => $request->input('id_kelas'),
            'nama_siswa' => $request->input('nama_siswa'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'golongan_darah' => $request->input('golongan_darah'),
            'alamat' => $request->input('alamat'),
            'hobi' => $request->input('hobi'),
            'foto' => $namafoto,
            'telepon' => $request->input('telepon'),
            'agama' => $request->input('agama'),
            'angkatan_tahun' => $angkatan_tahun,
        );

        $wer = siswa::orderBy('id_siswa', 'desc')->get();
        if (count($wer) >= 1) {
            foreach ($wer as $wor) {
                $ech =  $wor->no_induk_siswa;
                break;
            }
        }
        else{
            $ech = 000;
        }
        $data = siswa::create($query);
        $ids = $data->id_siswa;
        $tahun1 = substr(date('Y'),2);
        $tahun2 = $tahun1+1;
        $awal = $tahun1.$tahun2.'1';
        if ($awal == substr($ech,0,5)) {
            $q = substr($ech,5)+1;
        }else{
            $q = 1;
        }
        if (strlen($q) == 1) {
            $akhir = '00'.$q;
        }elseif (strlen($q) == 2) {
            $akhir = '0'.$q;
        }else{
            $akhir = $q;
        }
        $ndk = $awal.$akhir;
        $no_induk_siswa = array(
            'no_induk_siswa' => $ndk
        );
        $fix = siswa::where('id_siswa','=',$ids)->update($no_induk_siswa);
        $sql = array(
            'user_id' => $data->id_siswa,
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'level' => 2,
            'akses' => 'Y'
        );

        $data2 = User::create($sql);
        return redirect('siswa');
    }

  
    public function show($id)
    {
         $data['siswa'] = siswa::with('kelas')->orderBy('nama_siswa', 'asc')->where('id_siswa','=',$id)->first();
        return view('siswa.show',$data);
    }

  
    public function edit($id)
    {
        $data['title'] = 'Edit Siswa';
        $data['kelas'] = kelas::drop_options();
        $data['jenis_kelamin'] = Helper::jenis_kelamin();
        $data['golongan_darah'] = Helper::golongan_darah();
        $data['agama'] = Helper::agama();
        $data['query'] = siswa::where('id_siswa','=',$id)->join('kelas','kelas.id_kelas','=','siswas.id_kelas')->first();
        return view('siswa.edit', $data);
    }

 
    public function update(Request $request, $id)
    {
        $data = siswa::find($id);
        if (Input::hasFile('foto')) 
        {
            if ($data->foto != "default.png") {
                $y = substr('\2', 0,1);
                unlink(public_path('image\siswa'.$y.$data->foto));
            }
            $file = $request->file('foto');
            $siswa = siswa::all();
            $fileName = $file->getClientOriginalName();
            $i=0;
            foreach ($siswa as $key) {
                if ($i.$fileName == $key['foto'] ) {
                    $i++;
                }
            }
            $namafoto = $i.$fileName;
            $request->file('foto')->move("image/siswa", $namafoto);

        }
        else
        {
            $namafoto = $data->foto;
        }
        $rules = array(
            'no_induk_siswa' => 'required',
            'id_kelas' => 'required',
            'nama_siswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'alamat' => 'required',
            'foto' => 'required',
            'telepon' => 'required',
            'agama' => 'required',
          );
        $data->update($request->all());
        $foto = siswa::where('id_siswa',$data->id_siswa);
        $foto->update(['foto'=>$namafoto]);
        return redirect('siswa');
    }

    public function pdf()
    {
        $data['title'] = 'Siswa';
        $data['data'] = siswa::join('kelas','kelas.id_kelas','=','siswas.id_kelas')->get();
        $pdf = PDF::loadView('siswa.pdf', $data);
        return $pdf->stream('Laporan-Data-Siswa.pdf');
        //return view('siswa.pdf', $data);
    }


    public function delete($id)
    {
        $data = siswa::find($id);
        $query = array(
            'akses' => 'N'
        );
        $user = User::where('user_id','=',$id)->where('level','=',2)->update($query);
        $data->delete();
        return redirect('siswa');
    }
    public function restore($id)
    {
        $query = array(
            'akses' => 'Y'
        );
        $user = User::where('user_id','=',$id)->where('level','=',2)->update($query);
        $data = siswa::withTrashed()->where('id_siswa','=',$id)->restore();
        return redirect('siswa');
    }
    public function kenaikan(Request $request)
    {

        $status = $request->input('status');
        $nis = $request->input('nis');
        for ($i=0; $i < count($status); $i++) {
            if ($status[$i] == "naik") {
                $siswa = siswa::where('no_induk_siswa','=',$nis[$i]);
                $siswa->update(['id_kelas'=>$request->input('kelas')]);
                $nilai = transaksi_nilai::where('no_induk_siswa','=',$nis[$i]);
                $nilai->update(['status'=>'tidak']);
            }
            else{
                $angkatan = siswa::where('no_induk_siswa','=',$nis[$i])->first();
                $ganaek = $angkatan->angkatan_tahun + 1;
                $siswa = siswa::where('no_induk_siswa','=',$nis[$i]);
                $siswa->update(['angkatan_tahun'=> $ganaek]);
                $nilai = transaksi_nilai::where('no_induk_siswa','=',$nis[$i]);
                $nilai->update(['status'=>'tidak']);
            }
        }
        return redirect()->route('walikelas.index');
    }
}