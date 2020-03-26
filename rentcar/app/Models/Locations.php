<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table = 'location';
    public function get(){
        return \DB::table($this->table)
                    ->get();
    }
}
