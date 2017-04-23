<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\matpel;
use App\Models\role_matpel;
use App\Http\Requests;
use App\Http\Requests\matpelRequest;
use Session;

class MatpelController extends Controller
{
	public function index()
	{
		
        Session()->forget('add_kelas');
        Session()->forget('add_guru');
        Session()->forget('add_siswa');
        $data['title'] = 'Mata Pelajaran';
        $data['menu'] = '';
        $data['tingkat'] = role_matpel::all();
        $data['data'] = matpel::orderBy('nama_matpel', 'asc')->get();
        return view('matpel.index', $data);
	}
	public function sampah()
	{
        $data['title'] = 'Mata Pelajaran';
         $data['tingkat'] = role_matpel::all();
        $data['menu'] = 'sampah';
        $data['data'] = matpel::onlyTrashed()->orderBy('nama_matpel', 'asc')->get();
        return view('matpel.index', $data);
	}

	public function add()
	{
        $data['title'] = 'Tambah Pelajaran';
		return view('matpel.create',$data);
	}

	public function store(matpelRequest $request)
	{
        $data = matpel::create($request->all());
        $tingkat = $request['tingkat'];
        foreach ($tingkat as $key) {
        	$role = new role_matpel();
        	$role->id_matpel = $data->id_matpel;
        	$role->tingkat = $key;
        	$role->save();
        }
        if (Session::get('add_guru')) {
        	Session()->forget('add_guru');
        	return redirect()->route('guru.add');
        }
        return redirect('matpel');

	}

	public function edit($id)
	{
		$data['title'] = "Edit Matpel";
		$data['query'] = matpel::where('id_matpel','=',$id)->first();
        $data['role'] = role_matpel::where('id_matpel','=',$id)->get();
		return view('matpel.edit',$data);
	}

	public function update(Request $request, $id)
	{
		$rules = array(
                    'kode_matpel' => 'required',
                    'nama_matpel' => 'required',
                    'kkm' => 'required',
                    'tingkat' => 'required',
                  );
        $this->validate($request, $rules);
        $tingkat = $request['tingkat'];
		$hapus = role_matpel::where('id_matpel','=',$id)->delete();
        foreach ($tingkat as $key) {
			$cek = role_matpel::where('id_matpel','=',$id)->where('tingkat','=',$key)->first();
			if ($cek) {

			}
			else{
				$role = new role_matpel();
	        	$role->id_matpel = $id;
	        	$role->tingkat = $key;
	        	$role->save();
			}
		}
        	
        
        $data = matpel::find($id);
        $data->update($request->all());

        return redirect('matpel');
	}

	public function delete($id)
	{
		$data = matpel::find($id);
		$data->delete();
		return redirect('matpel');
	}
	public function restore($id){
		$data = matpel::withTrashed()->where('id_matpel','=',$id)->restore();
		return redirect('matpel');
	}
}
