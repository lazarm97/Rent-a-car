<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->data['navigation'] = [
          [
              "title" => "Home",
              "url" => route('home')
          ],
          [
              "title" => "Services",
              "url" => route('services')
          ],
          [
              "title" => "Cars",
              "url" => route('cars')
          ],
          [
              "title" => "About",
              "url" => route('about')
          ],
          [
              "title" => "Contact",
              "url" => route('contact')
          ]
        ];
    }
}
