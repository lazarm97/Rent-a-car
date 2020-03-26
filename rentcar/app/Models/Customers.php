<?php


namespace App\Models;


class Customers
{
    protected $table = 'customers';

    public function getByEmailAndPassword($email, $password){
        return \DB::table($this->table.' as c')
            ->join('roles as r', 'c.role_id', '=', 'r.id_role')
            ->select('c.*', 'r.name')
            ->where([
                ['email', '=', $email],
                ['password', '=', md5($password)]
            ])
            ->first();
    }

    public function getById($id){
        return \DB::table($this->table)
            ->select('first_name', 'last_name', 'email', 'identity_card_number as icn', 'mobile')
            ->where([
                ['id_customer', '=', $id]
            ])
            ->first();
    }

    public function insert($fName, $lName, $email, $password, $icn, $mobile, $roleId = 2){
        \DB::table($this->table)
            ->insert([
                'first_name' => $fName,
                'last_name' => $lName,
                'email' => $email,
                'password' => md5($password),
                'identity_card_number' => $icn,
                'mobile' => $mobile,
                'role_id' => $roleId
            ]);
    }

    public function delete($id){
        return \DB::table($this->table)
            ->where([
                ['id_customer', '=' , $id]
            ])
            ->delete();
    }

    public function update($id,$email,$password,$icn,$mobile){
        return \DB::table($this->table)
            ->where('id_customer', $id)
            ->update([
                'email' => $email,
                'password' => md5($password),
                'identity_card_number' => $icn,
                'mobile' => $mobile
            ]);
    }

    public function getAll(){
        return \DB::table($this->table)
            ->get();
    }
}
