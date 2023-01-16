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
		$userData = User::limit(3)->get();
		foreach ($userData as $key => $user) {
			$mailData = [
				'title' => "Pemira STTNF 2023",
				// 'body' => "Username",
			];
			Mail::to($user->email)->send(new SendInvitationToUserMail($mailData));
		}
	}
}