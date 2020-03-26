<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cars;
use App\Services\CarService;
use Illuminate\Http\Request;

class CarsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Cars();
    }

    public function index()
    {
        $this->data['cars'] = $this->model->getAll();
        return view('pages.admin.cars_manager', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new CarService();
        try {
            $service->insert($request);
        }catch (\PDOException $ex){
            return redirect()->back()->with('messages', 'Try again!');
        }

        return redirect()->back()->with('messages', 'Car is created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = $this->model->getOneById($id);
        return response()->json($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $service = new CarService();
        try {
            $service->update($request);
        }catch (\PDOException $ex){
            return response($ex->getMessage(), 500);
        }

        return response(null,204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
    }

    public function getAll(){
        $cars = $this->model->getAll();
        return response()->json($cars);
    }
}
