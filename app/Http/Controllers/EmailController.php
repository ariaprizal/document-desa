<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index(Request $request)
    {
        $emailBody =[
            'title' => 'Kritik Dan Saran',
            'name' => 'Pengirim '.Auth::user()->name,
            'body' => $request->body,
        ];

        Mail::to('aprizallari@gmail.com')->send(new SendEmail($emailBody));
        return redirect()->back()->with('message', 'Kritik Dan Saran Terkirim');
    }
}
