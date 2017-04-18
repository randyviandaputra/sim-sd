<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\kepalasekolah;
use App\Models\datasekolah;

use Auth;

use App\Http\Requests;

class UserController extends Controller
{
	public function createAdmin()
	{
		return view('user.createAdmin');
	}

	public function postAdmin(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required|unique:users',
    		'password' => 'required|min:4',
            'nama' => 'required',
            'daerah' => 'required',
            'kepala'=>'required',
            'nip' => 'required',
    	]);

    	$user = new User([
    		'username' => $request->input('username'),
    		'password' =>  bcrypt($request->input('password')),
    		'user_id' => 0,
    		'level' => 3,
    	]);

        $sekolah = new datasekolah([
            'nama_sekolah' => $request->input('nama'),
            'daerah' =>  $request->input('daerah'),
        ]);

        $kepala = new kepalasekolah([
            'nama_kepala' => $request->input('kepala'),
            'no_induk' =>  $request->input('nip'),
            'tahun' => date("Y"),
        ]);
        $user->save();
        $sekolah->save();
        $kepala->save();
    	return redirect()->route('dashboard');
    }
}
