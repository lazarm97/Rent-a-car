<?php


namespace App\Services;
use App\Models\Cars;
use App\Services\UploadService;

class CarService
{
    private $model;

    public function __construct(){
        $this->model = new Cars();
    }

    public function insert($request){
        $slika = $this->upload($request);
        \DB::beginTransaction();
        try {
            $this->model->insert($request, $slika);
            \DB::commit();
        }
        catch(\Exception $ex) {
            \DB::rollback();
        }
    }

    public function update($request){
        $id = $request->input('id');
        $brand = $request->input('brand');
        $model = $request->input('model');
        $transmission = $request->input('transmission');
        $doors = $request->input('doors');
        $seats = $request->input('seats');
        $price = $request->input('price');
        $fuel = $request->input('fuel');
        $vin = $request->input('vin');
        $description = $request->input('description');
        \DB::beginTransaction();
        try {
            $this->model->update($id,$brand,$model,$transmission,$doors,$seats,$price,$fuel,$vin,$description);
            \DB::commit();
        }
        catch(\Exception $ex) {
            \DB::rollback();
        }


    }

    private function upload($request){
        $tmpSlika = $request->file("image");
        $slika = UploadService::upload($tmpSlika);
        return $slika;
    }
}
