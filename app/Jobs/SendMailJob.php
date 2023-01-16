<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\SendInvitationController;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $sendEmail;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->sendEmail = new SendInvitationController();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd($this->sendEmail);
        $this->sendEmail->sendInvitation();
        // $s = [];
        // $n = 1000000;
        // for ($i=0; $i < $n; $i++) { 
        //     $s[] = $i;
        //     echo $s[$i];
        // }
    }
}
