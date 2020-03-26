<?php

namespace App\Http\Controllers;
use App\Http\Requests\ReservationRequest;
use App\Models\Cars;
use App\Models\Locations;
use App\Models\Reservations;
use Illuminate\Http\Request;

class ReservationController extends FrontController
{
    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Reservations();
    }

    public function Reservation($id){
        $this->data['title'] = 'Reservation';
        $modelCar = new Cars();
        $this->data['car'] = $modelCar->getOneById($id);
        $modelLocation = new Locations();
        $this->data['locations'] = $modelLocation->get();
        return view('pages.reservation', $this->data);
    }

    public function DoReservation(ReservationRequest $request){
        $idCar = $request->input('idCar');
        $idCustomer = $request->input('idCustomer');
        $pLocation = $request->input('pLocation');
        $pDate = $request->input('pDate');
        $rLocation = $request->input('rLocation');
        $rDate = $request->input('rDate');
        $description = $request->input('description');
        $days = strtotime($rDate) - strtotime($pDate);
        $days = date('d', $days);


        $modelCar = new Cars();
        $pricePerDay =  $modelCar->getPrice($idCar);
        $price = $days * $pricePerDay->price;

        try {
            $this->model->insert($idCar,$idCustomer,$price,$pLocation,$pDate,$rLocation,$rDate,$description);
        }catch (\PDOException $ex){

            return \redirect(route('reservation'))->with('message', 'Registration error!');
        }

        return \redirect(route('user'));
    }

}
