<?php

namespace App\Http\Controllers;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;




use App\Mail\SendMailable;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    //

    public function sendEmail()
    {
//        Mail::to('mail@appdividend.com')->send(new SendMailable());
//        echo 'email sent';

        $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(3));
        dispatch($emailJob);
//        dd($res);

        echo 'email sent';
    }
}
