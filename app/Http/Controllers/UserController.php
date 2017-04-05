<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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
    		'password' => 'required|min:4'
    	]);

    	$user = new User([
    		'username' => $request->input('username'),
    		'password' =>  bcrypt($request->input('password')),
    		'user_id' => 0,
    		'level' => 3,
    	]);
    	$login = new User([
    		'username' => $request->input('username'),
    		'password' =>  bcrypt($request->input('password')),
    	]);

        Auth::login($login);
    	$user->save();

    	return redirect()->route('dashboard');
    }
}
