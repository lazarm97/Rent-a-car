<?php

namespace App\Mail;

use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAdmin extends Mailable
{
    use Queueable, SerializesModels;

    private $fName;
    private $lName;
    private $email;
    private $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fName,$lName,$email,$body)
    {
        $this->fName = $fName;
        $this->lName = $lName;
        $this->email = $email;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $write = "First name : $this->fName<br> Last nam : $this->lName<br> Email : $this->email<br> Content : $this->body";
        return $this->from('rentcarlaravel@gmail.com')->subject('Kontakt adminu')->html($write);
    }
}
