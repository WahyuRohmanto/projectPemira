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
	private $password = [];
	
	function queueJob() {
		dispatch(new SendMailJob);
		return redirect('login');
	}
	
	function createUserPassword() {
		// dd(substr(md5(microtime()),2,5));
		DB::beginTransaction();
		try {
			$users = User::limit(4)->get()->sortBy('name');
			$userCount = 0;
			foreach($users as $user){
				$userdata = User::find($user->id);

				#generate password
				$randomChar = substr(md5(microtime()),2,5);//rtrim(substr($user->name, 1, 4));
				$this->password[] = $randomChar.$user->nim;

				#store data
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
		$unhashedUserPassword = [];
		foreach ($users as $user) {
			$mailData = [
				'title' => 'Akun Pemira STTNF 2022',
				'body' => `Username : `.$user->nim.`\nPassword kamu : `.$this->password[$userCount],
			];
			$unhashedUserPassword[] = $this->password[$userCount];
			$userCount++;
			Mail::to($user->email)->send(new SendPasswordToUserMail($mailData));
		}
	}
}
