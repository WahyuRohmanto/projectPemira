<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use App\Mail\SendInvitationToUserMail;
use App\Models\User;
use App\Jobs\SendMailJob;

class SendInvitationController extends Controller
{
	function queueJob() {
		SendMailJob::dispatch();
		return redirect('login');
	}
	
	function sendInvitation() 
	{
		$userData = User::limit(2)->get();
		foreach ($userData as $key => $user) {
			$mailData = [
				'title' => "Pemira STTNF 2023",
				'username' => $user->name,
				'nim' => $user->nim,
				'password' => $user->password_noHash,
			];
			Mail::to($user->email)->send(new SendInvitationToUserMail($mailData));
		}
	}
}