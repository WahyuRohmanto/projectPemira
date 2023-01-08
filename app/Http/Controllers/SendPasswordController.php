<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use App\Mail\SendInvitationToUserMail;
use App\Models\User;
use App\Jobs\SendMailJob;

class SendPasswordController extends Controller
{
	function queueJob() {
		dispatch(new SendMailJob);
		// return redirect('login');
	}
	
	function createUserPassword() 
	{
		$userData = User::limit(3)->get();
		foreach ($userData as $key => $user) {
			$mailData = [
				'title' => "Akun Pemira STTNF 2023",
				// 'body' => "Username",
			];
			Mail::to($user->email)->send(new SendInvitationToUserMail($mailData));
		}
	}
}