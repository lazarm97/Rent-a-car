<?php

namespace App\Http\Controllers;
use App\Models\Cars;
use Illuminate\Http\Request;

class HomeController extends FrontController
{

    public function Index()
    {
        $carModel = new Cars();
        $this->data['homeCar'] = $carModel->getFirst();
        $this->data['cars'] = $carModel->getAll();
        return view('pages.home', $this->data);
    }
}
