<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customers;

class AuthController extends FrontController
{

    public function Login(){
        $this->data['title'] = 'Login';
        return view('pages.login', $this->data);
    }

    public function DoLogin(LoginRequest $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $isAdmin = $request->input('isAdmin');

        $modelCustomer = new Customers();
        $modelAdmin = new Admin();
        try {
            if($isAdmin == true)
                $user = $modelAdmin->getByEmailAndPassword($email,$password);
            else
                $user = $modelCustomer->getByEmailAndPassword($email,$password);
        }catch (\PDOException $ex){

            return \redirect()->back()->with('message', 'Error with database!');
        }

        if($user){
            $request->session()->put('user', $user);
            \Log::channel('logginLog')->info("Logovanje ". date("Y-m-d H:i:s")." ".$request->ip());
            return \redirect(route('home'))->with('message', 'Successfull logging!');
        }else{
            return \redirect(route('login'))->with('message', 'You musti be registered!');
        }


    }

    public function Logout(Request $request){
        $request->session()->forget('user');
        $request->session()->flush();
        \Log::channel('logoutLog')->info("Odjava ". date("Y-m-d H:i:s")." ".$request->ip());
        return redirect(route('home'))->with('message', 'Izlogovani ste!');
    }

    public function Registration(){
        $this->data['title'] = 'Registration';
        return view('pages.registration', $this->data);
    }

    public function DoRegistration(RegistrationRequest $request){
        $fName = $request->input('fName');
        $lName = $request->input('lName');
        $email = $request->input('email');
        $password = $request->input('password');
        $icn = $request->input('icn');
        $mobile = $request->input('mobile');

        $model = new Customers();
        try {
            $model->insert($fName,$lName,$email,$password,$icn,$mobile);
        }catch (\PDOException $ex){
            return \redirect(route('registration'))->with('message', 'Registration is not possible!');
        }
        \Log::channel('registrationLog')->info("Registracija ". date("Y-m-d H:i:s")." ".$request->ip());
        return \redirect(route('login'));

    }
}
