<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    function sendMail() {
        Mail::to('hansonivander@gmail.com')->send(new TestEmail('Hanson'));
        return redirect('/home');
    }
}
