<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\matpel;
use App\Http\Requests;

class MatpelController extends Controller
{
	public function index()
	{
        $data['title'] = 'Mata Pelajaran';
        $data['menu'] = '';
        $data['data'] = matpel::orderBy('nama_matpel', 'asc')->get();
        return view('matpel.index', $data);
	}
	public function sampah()
	{
        $data['title'] = 'Mata Pelajaran';
        $data['menu'] = 'sampah';
        $data['data'] = matpel::onlyTrashed()->orderBy('nama_matpel', 'asc')->get();
        return view('matpel.index', $data);
	}

	public function add()
	{
        $data['title'] = 'Tambah Pelajaran';
		return view('matpel.create',$data);
	}

	public function store(Request $request)
	{
		$rules = array(
                    'kode_matpel' => 'required',
                    'nama_matpel' => 'required',
                    'kkm' => 'required',
                  );
        $this->validate($request, $rules);
        $data = matpel::create($request->all());
        return redirect('matpel');

	}

	public function edit($id)
	{
		$data['title'] = "Edit Matpel";
		$data['data'] = matpel::where('id_matpel','=',$id)->get();
		return view('matpel.edit',$data);
	}

	public function update(Request $request, $id)
	{
		$rules = array(
                    'kode_matpel' => 'required',
                    'nama_matpel' => 'required',
                    'kkm' => 'required',
                  );
        $this->validate($request, $rules);
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
