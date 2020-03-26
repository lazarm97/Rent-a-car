<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminAdminCreateRequest;
use App\Http\Requests\AdminAdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Admin();
    }

    public function index(){
        $id = session('user')->id_user;
        $currentAdmin = $this->model->getById($id);
        $this->data['admin'] = $currentAdmin;
        return view('pages.admin.admin_manager', $this->data);
    }

    public function destroy($id){
        try {
            $this->model->delete($id);
        }catch (\PDOException $ex){
            return response($ex->getMessage() , 500);
        }
        return response(null, 204);
    }

    public function update(AdminAdminUpdateRequest $request)
    {
        $id = $request->input('id');
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $this->model->update($id,$email,$password);
        }catch (\PDOException $ex){
            return response($ex->getMessage() , 500);
        }
        return response(null, 204);
    }

    public function create(AdminAdminCreateRequest $request)
    {
        $fName = $request->input('fName');
        $lName = $request->input('lName');
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $this->model->insert($fName,$lName,$email,$password);
        }catch (\PDOException $ex){
            return response($ex->getMessage() , 500);
        }
        return response(null, 204);
    }

}
