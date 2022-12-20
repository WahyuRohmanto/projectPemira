<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\MailController;

class AuthController extends Controller
{
	public function login()
	{
		return view('pages.login');
	}

	public function register()
	{
		return view('pages.register');
	}

	public function registerSuccess()
	{
		return view('pages.register-success');
	}

	public function logout()
	{
		FacadesSession::flush();

		Auth::logout();

		return redirect('/');
	}

	public function auth(Request $request)
	{
		date_default_timezone_set("Asia/Jakarta");
		if ($request->input('nim') !== '9710101011') {
			if (strtotime("now") < strtotime("2022-12-10 06:00:00") || strtotime("now") > strtotime("2022-12-30 19:00:00")) {
				Alert::error('Gagal', 'Sesi Voting diTutup');
				return redirect()->to('/login');
			}
		}
		$nim = $request->input('nim');
		$user =  User::where('nim', $nim)->first();
		$password = Hash::check($request->input('password'), $user->password);

		if ($user && $password == 1) {
			Auth::login($user, true);
			if (Auth::user()->hasRole('admin')) {
				return redirect()->to('/admin');
			} else {
				return redirect()->to('/voting');
			}
		} else {
			Alert::error('Gagal', 'NIM & Password Salah');
			return redirect()->to('/login');
		}
	}
}
