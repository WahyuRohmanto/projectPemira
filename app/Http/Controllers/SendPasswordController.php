<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use App\Mail\SendPasswordToUserMail;
use App\Models\User;
use App\Jobs\SendMailJob;

class SendPasswordController extends Controller
{
	protected $password = [];
	
	function queueJob() {
		dispatch(new SendMailJob);
		return redirect('login');
	}
	
	function createUserPassword() {
		DB::beginTransaction();
		try {
			$users = User::limit(4)->get()->sortBy('name');
			$userCount = 0;
			foreach($users as $user){
				$userdata = User::find($user->id);
				$combinedString = rtrim(substr($user->name, 1, 4));
				$this->password[] = $combinedString.$user->nim;
				$email = $userdata->email;
				$userdata->password = bcrypt($this->password[$userCount]);
				$userdata->save();
				$userCount++;
			}
			$this->sendPasswordToUser(); 
		} catch (\Throwable $th) {
			DB::rollback();
			throw $th;
		}
	}
	
	function sendPasswordToUser()
	{
		$users = User::limit(4)->get()->sortBy('name'); 
		$userCount = 0;
		$test = [];
		foreach ($users as $u) {
			$mailData = [
				'title' => 'Password Login Akun Pemira',
				'body' => 'Password kamu : '.$this->password[$userCount],
			];
			$test[] = $this->password[$userCount];
			$userCount++;
			Mail::to($u->email)->send(new SendPasswordToUserMail($mailData));
		}
	}
}
