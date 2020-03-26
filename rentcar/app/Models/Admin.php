<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin
{
    protected $table = 'users';
    public function getByEmailAndPassword($email, $password){
        return \DB::table($this->table.' as u')
                    ->join('roles as r', 'u.role_id', '=', 'r.id_role')
                    ->select('u.*', 'r.name')
                    ->where([
                        ['email', '=', $email],
                        ['password', '=', md5($password)]
                    ])
                    ->first();
    }

    public function getById($id){
        return \DB::table($this->table)
            ->select('id_user', 'first_name', 'last_name', 'email')
            ->where([
                ['id_user', '=', $id]
            ])
            ->first();
    }

    public function insert($fName, $lName, $email, $password, $roleId = 1){
                 \DB::table($this->table)
                    ->insert([
                       'first_name' => $fName,
                        'last_name' => $lName,
                        'email' => $email,
                        'password' => md5($password),
                        'role_id' => $roleId
                    ]);
    }

    public function delete($id){
        return \DB::table($this->table)
                    ->where([
                        ['id_user', '=' , $id]
                    ])
                    ->delete();
    }

    public function update($id,$email,$password){
        return \DB::table($this->table)
                    ->where('id_user', $id)
                    ->update([
                        'email' => $email,
                        'password' => md5($password)
                    ]);
    }
}
