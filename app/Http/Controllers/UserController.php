<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
	{
		$credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
			return redirect()->intended('home');
		}
	}

	public function logout()
	{
		Auth::logout();

		return redirect('/');
	}

	public function register(Request $request)
	{
		$request->validate([
			'email' => 'required|unique:users|confirmed',
			'password' => 'required|min:8|confirmed'
		]);

		$user = new User($request->all());
		$user->save();

		Auth::login($user);

		return redirect('/');
	}
}
