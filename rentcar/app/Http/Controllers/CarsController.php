<?php

namespace App\Http\Controllers;
use App\Models\Cars;
use Illuminate\Http\Request;

class CarsController extends FrontController
{
    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Cars();
    }

    public function Index(){
        $this->data['title'] = 'Cars';
        $this->data['cars'] = $this->model->getAllWithPagination();
        return view('pages.cars', $this->data);
    }

    public function Fetch(Request $request)
    {
        if($request->ajax())
        {
            $this->data['cars'] = $this->model->getAllWithPagination();
            return view('pages.pagination_cars', $this->data);
        }
    }



}
