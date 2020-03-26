<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCustomerCreateRequest;
use App\Http\Requests\AdminCustomerUpdateRequest;
use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends BaseController
{

    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Customers();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['customers'] = $this->model->getAll();
        return view('pages.admin.customer_manager', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AdminCustomerCreateRequest $request)
    {
        $fName = $request->input('fName');
        $lName = $request->input('lName');
        $email = $request->input('email');
        $password = $request->input('password');
        $icn = $request->input('icn');
        $mobile = $request->input('mobile');

        try {
            $this->model->insert($fName,$lName,$email,$password,$icn,$mobile);
        }catch (\PDOException $ex){
            return response($ex->getMessage() , 500);
        }
        return response(null, 204);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = $this->model->getById($id);
        return response()->json($customers);
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
    public function update(AdminCustomerUpdateRequest $request)
    {
        $id = $request->input('id');
        $email = $request->input('email');
        $password = $request->input('password');
        $icn = $request->input('icn');
        $mobile = $request->input('mobile');

        try {
            $this->model->update($id,$email,$password,$icn,$mobile);
        }catch (\PDOException $ex){
            return response($ex->getMessage() , 500);
        }
        return response(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->model->delete($id);
        }catch (\PDOException $ex){
            return response($ex->getMessage() , 500);
        }
        return response(null, 204);
    }

    public function getAll(){
        $customers = $this->model->getAll();
        return response()->json($customers);
    }
}
