<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\MailController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
	use AuthenticatesUsers;

    public function username()
    {
        return 'nim';
    }

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
		$jikaWaktuSesuai = strtotime("now") < strtotime("2023-02-12 06:00:00") || strtotime("now") > strtotime("2023-03-03 19:00:00");
		if ($request->nim !== '9710101011' ) {
			if ($jikaWaktuSesuai) {
				Alert::error('Gagal', 'Sesi Voting ditutup');
				return redirect()->to('/login');
			}
		}
		
		$userData = $request->only(['nim','password']);
		if (Auth::attempt($userData)) {
			if (Auth::user()->hasRole('admin')) {
				return redirect()->to('/admin');
			} else {
				return redirect()->to('/voting');
			}
		} else {
			Alert::error('Gagal', 'NIM & Password Salah');
			return redirect()->to('/login')->withInput();
		}
	}
}