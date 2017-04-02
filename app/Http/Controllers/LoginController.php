<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\Guru;
use App\Models\siswa;

use Auth;

class LoginController extends Controller
{
    public function index()
    {
    	return view('index');
    }
    public function postLogin(Request $request)
    {
    	$this->validate($request,[
    		'username' => 'required',
    		'password' => 'required'
    	]);
    	if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) 
        {
    		return redirect()->route('dashboard');
    	}
        else
        {
    		return redirect()->back();
    	}
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
