<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kelas;
use App\Models\Guru;
use App\Models\siswa;
use App\Models\User;
use App\Models\matpel;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use PDF;

class SiswaController extends Controller
{
    
    public function index()
    {
        $data['title'] = 'Siswa';
        $data['menu'] = '';

        $data['kelas'] = kelas::all();
        $query = siswa::with('kelas')->orderBy('nama_siswa', 'asc');
        if (Input::has('cari_nama')) {
            $query->where('nama_siswa','like','%'.Input::get('cari_nama').'%');
        }
        if (Input::has('cari_kelas')) {
            $query->where('id_kelas','=',Input::get('cari_kelas'));
        }
        $data['data'] = $query->orderBy('nama_siswa', 'asc')->paginate(15);
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
        return view('siswa.index', $data);
    }


    public function add()
    {
        $data['title'] = 'Tambah Siswa';
        $data['kelas'] = kelas::orderBy('nama_kelas', 'asc')->get();
        return view('siswa.create', $data);
    }

  
    public function store(Request $request)
    {
        $this->validate($request, [
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
            'username' => 'required|unique:users'
        ]);

        $file = $request->file('foto');
        $guru = siswa::all();
        $fileName = $file->getClientOriginalName();
        $i=0;
        foreach ($guru as $key) {
            if ($i.$fileName == $key['foto'] ) {
                $i++;
            }
        }
        $namafoto = $i.$fileName;
        $request->file('foto')->move("image/siswa", $namafoto);

        $query = array(
            'no_induk_siswa' => $request->input('no_induk_siswa'),
            'id_kelas' => $request->input('id_kelas'),
            'nama_siswa' => $request->input('nama_siswa'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'golongan_darah' => $request->input('golongan_darah'),
            'alamat' => $request->input('alamat'),
            'foto' => $namafoto,
            'telepon' => $request->input('telepon'),
            'agama' => $request->input('agama')
        );

        $data = siswa::create($query);
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
        
    }

  
    public function edit($id)
    {
        $data['title'] = 'Edit Siswa';
        $data['kelas'] = kelas::orderBy('nama_kelas', 'asc')->get();
        $data['data'] = siswa::where('id_siswa','=',$id)->join('kelas','kelas.id_kelas','=','siswas.id_kelas')->first();
        return view('siswa.edit', $data);
    }

 
    public function update(Request $request, $id)
    {
        $data = siswa::find($id);
        if (Input::hasFile('foto')) 
        {
            $y = substr('\2', 0,1);
            unlink(public_path('image\siswa'.$y.$data->foto));
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
}