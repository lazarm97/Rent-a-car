<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Reservations;
use App\Models\Customers;
use Illuminate\Http\Request;

class UserController extends FrontController
{
    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Customers();
    }

    public function Index(){
        $this->data['title'] = 'Account manager';
        $customerId = session('user')->id_customer;
        $this->data['user'] = $this->model->getById($customerId);
        $modelReservation = new Reservations();
        $this->data['reservations'] = $modelReservation->getByUserId($customerId);
        return view('pages.user', $this->data);
    }

    public function Delete($id){
        $rez = $this->model->delete($id);
        if($rez){
            return \redirect(route('logout'))->with('message', 'Success deleted account!');
        }else{
            return \redirect()->back()->with('message', 'Something was wrong!');
        }
    }

    public function Update(UserUpdateRequest $request){
        if($request->has('action') && $request->get('action') == 'updateUser'){
            $id = $request->input('id');
            $email = $request->input('email');
            $password = $request->input('password');
            $icn = $request->input('icn');
            $mobile = $request->input('mobile');

            try {
                $this->model->update($id,$email,$password,$icn,$mobile);
                $uspeh = 1;
            }catch (\PDOException $ex){
                $uspeh = 0;
                return \redirect()->back()->with('message', 'greska sa bazom');
            }
            if($uspeh == 1)
                return response(null, 204);
            else
                return response(null, 500);
        }

    }

    public function getUser(Request $request){
        $id = $request->get('id');
        $user = $this->model->getById($id);
        echo json_encode($user);
    }
}
