<?php

namespace App\Models;

use Illuminate\Http\Request;
//use http\Env\Request;

class Cars{
    protected $table = 'cars';

    public function getAll(){
        return \DB::table($this->table)->get();
    }

    public function getAllWithPagination(){
        return \DB::table($this->table)->simplePaginate(6);
    }

    public function getOneByName($brand = "Land Rover",$model = "Range Rover"){
        return \DB::table($this->table)
                    ->where([
                        ["brand", $brand],
                        ["model", $model]
                    ])
                    ->first();
    }

    public function getOneById($id){
        return \DB::table($this->table)
                    ->where([
                        ["id_car", "=", $id]
                    ])
                    ->first();
    }

    public function insert(Request $request,$slika){
        return \DB::table($this->table)
                    ->insert(
                        [
                            'brand' => $request->input('brand'),
                            'model' => $request->input('model'),
                            'transmission' => $request->input('transmission'),
                            'doors' => $request->input('doors'),
                            'seats' => $request->input('seats'),
                            'price' => $request->input('price'),
                            'fuel' => $request->input('fuel'),
                            'vin' => $request->input('vin'),
                            'description' => $request->input('description'),
                            'image' => $slika
                        ]
                    );
    }

    public function delete($id){
        return \DB::table($this->table)
                    ->where([
                        ['id_car', '=', $id]
                    ])
                    ->delete();
    }

    public function update($id,$brand,$model,$transmission,$doors,$seats,$price,$fuel,$vin,$description){
        return \DB::table($this->table)
            ->where('id_car', $id)
            ->update(
                    ['brand' => $brand,
                    'model' => $model,
                    'transmission' => $transmission,
                    'doors' => $doors,
                    'seats' => $seats,
                    'price' => $price,
                    'fuel' => $fuel,
                    'vin' => $vin,
                    'description' => $description]
            );

    }

    public function getFirst(){
        return \DB::table($this->table)
                    ->first();
    }

    public function getPrice($id){
        return \DB::table($this->table)
            ->where([
                ["id_car", "=", $id]
            ])
            ->select('price')
            ->first();
    }
}
