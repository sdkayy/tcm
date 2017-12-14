<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
    {
    	$this->middleware('guest')->except(['logout', 'changePassword', 'setPassword']);
    }

	public function index()
	{
		return view('users.index');
	}

    public function login()
    {
    	$this->validate(request(), [
    		'username' => 'required',
    		'password' => 'required'
    	]);

    	if(!auth()->attempt(request(['username', 'password']))) {
    		return back()->withErrors([
    			'Error verifying your credentials'
    		]);
    	}

        if(auth()->user()->admin_level < 0) {
            return redirect('accounts/password');
        }

    	return redirect('dashboard');
    }

    public function changePassword()
    {
        return view('users.password');
    }

    public function setPassword()
    {
        $this->validate(request(), [
            'password' => 'required|confirmed'
        ]);

        $user = auth()->user();
        $user->password = bcrypt(request('password'));
        $user->admin_level = abs(auth()->user()->admin_level);
        $user->save();

        return redirect('dashboard');
    }

    public function register()
    {

    }

    public function logout()
    {
    	auth()->logout();

        return redirect('login');
    }
}
