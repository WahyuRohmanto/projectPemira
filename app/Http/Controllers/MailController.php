<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendPasswordToUserMail;
use App\Models\User;

class MailController extends Controller
{
    protected $password = [];

	function nyoba() {
		$sendEmail = new MailController();
		$users = User::limit(5)->get();
		
		$email = [];
		$i = 0; 
		foreach($users as $user){
			$userdata = User::find($user->id);
			$combinedString = rtrim(substr($user->name, 1, 5));
			$this->password[] = $combinedString.$user->nim;
			$email[] = $userdata->email;
			$userdata->password = bcrypt($this->password[$i]);
			$userdata->save();
			$i++;
		}
		$this->index();
		return view('email.send-password',compact('password'));
	}

    function index()
    {
        $users = User::limit(3)->get(); 
        $i = 0;
        foreach ($users as $u) {
            $mailData = [
                'title' => 'Password Login Akun Pemira',
                'body' => 'Password kamu : '.$this->password[$i],
            ];
    
            Mail::to($u->email)->send(new SendPasswordToUserMail($mailData));
            $i++;
        }

        dd('Email berhasil dikirim !');
    }
}
