<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends FrontController
{

    public function About(){
        $this->data['title'] = 'About';
        return view('pages/about', $this->data);
    }

    public function Services(){
        $this->data['title'] = 'Services';
        return view('pages/services', $this->data);
    }
}
