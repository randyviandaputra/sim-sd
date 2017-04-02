<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kelas;
use App\Models\Guru;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $title = "Tambah Kelas";
        $guru = Guru::all();
        return view('kelas.create',compact('title','guru'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'nama_kelas' => 'required',
            'aktif' => 'required' 
        );
        $this->validate($request,$rules);
        $data = kelas::create($request->all());
        return redirect('kelas');
    }

    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit Kelas";
        $guru = Guru::all();
        $data = kelas::find($id);
        return view('kelas.edit',compact('data','title','guru'));
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
