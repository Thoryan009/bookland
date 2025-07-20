<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        $to='ahshasan009@gmail.com';
        $msg='Hello Siam ki obostha?';
        $subject='test1 email sending';
        
        Mail::to($to)->send(new WelcomeEmail($msg, $subject));
        return 'Email sent';
    }
}
