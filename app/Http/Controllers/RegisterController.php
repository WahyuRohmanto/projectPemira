<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Mail\RegisMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Aman\EmailVerifier\EmailChecker;
use Alert;

class RegisterController extends Controller
{
    private $register = [];

    function index()
    {
        return view('pages.register');
    }

    function check(Request $request)
    {
        if ($request->nim) {
            $data = User::where('nim', $request->nim)->first();
            if (!$data) {
                $this->response['status'] = 'Failed';
                $this->response['data'] = 'Not Found';
                $this->response['message'] = 'Nim Not Found';
                return response($this->response, 404);
            } else {
                $this->response['status'] = 'Success';
                $this->response['data'] = $data;
                $this->response['message'] = 'Nim Found';
                return response($this->response, 200);
            }
        } else {
            $this->response['status'] = 'Failed';
            $this->response['data'] = 'Not Found';
            $this->response['message'] = 'Nim Is Required';
            return response($this->response, 404);
        }
    }

    function register(Request $request)
    {
        if ($request->nim && $request->email) {
            $validate_email = strtolower($request->email);
            $data = User::where('nim', $request->nim)->first();
            //check if user data is exist
            if ($data) {
                $details = [
                    'nim' => $request->nim,
                    'password' => $data->password_noHash
                ];
                Mail::to($request->email)->send(new RegisMail($details));
                Alert::success('Sukses','Username dan password berhasil dikirim, silakan cek email kamu !');
                return redirect()->to('/admin/register')->with('success','Register berhasil, silakan cek email anda');
            } else {
                $details = [
                    'nim' => $request->nim,
                    'password' => $data->password_noHash
                ];
                $checkMail = app(EmailChecker::class)->checkMxAndDnsRecord($validate_email);
                if ($checkMail[0] == 'invalid') {
                    Alert::error('Gagal','Username dan password gagal dikirim, pastikan email sudah benar !');
                    return redirect()->to('/admin/register');
                } else {
                    Mail::to($request->email)->send(new RegisMail($details));
                    User::where('nim', $request->nim)->update([
                        'email' => $request->email, 
                        'status' => 1, 
                    ]);
                    Alert::success('Sukses','Username dan password berhasil dikirim, silakan cek email kamu !');
                    return redirect()->to('/admin/register')->with('success','Register berhasil, silakan cek email anda');
                }
            }
        } else {
            $this->response['status'] = 'Failed';
            $this->response['data'] = 'Not Found';
            $this->response['message'] = 'Nim and Email is Required';
            return response($this->response, 404);
        }
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
