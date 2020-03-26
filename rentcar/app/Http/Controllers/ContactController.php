<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\ContactAdmin;

class ContactController extends FrontController
{
    public function Index(){
        $this->data['title'] = 'Contact';
        return view('pages/contact', $this->data);
    }

    public function sendMail(MailRequest $request){
        $fName = $request->input('fName');
        $lName = $request->input('lName');
        $email = $request->input('email');
        $body = $request->input('body');

//       OVDE IDE MEJL ZA ADMINA!!
        \Mail::to('guster.9@yandex.com')->send(new ContactAdmin($fName,$lName,$email,$body));
        return redirect()->back()->with('message', 'Message has been sent!');

    }
}
