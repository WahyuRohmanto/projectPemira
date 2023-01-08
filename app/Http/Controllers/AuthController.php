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

	public function logout()
	{
		FacadesSession::flush();
		
		Auth::logout();
		
		return redirect('/');
	}
	
	public function auth(Request $request)
	{
		$jikaWaktuSesuai = strtotime("now") < strtotime("2023-01-01 06:00:00") || strtotime("now") > strtotime("2023-01-09 19:00:00");

		if ($request->input('nim') !== '9710101011') {
			if ($jikaWaktuSesuai) {
				Alert::error('Gagal', 'Sesi Voting diTutup');
				return redirect()->to('/login');
			}
		}
		
		$nim = $request->nim;
		$user =  User::where('nim', $nim)->first();
		$password = Hash::check($request->password, $user->password);

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
