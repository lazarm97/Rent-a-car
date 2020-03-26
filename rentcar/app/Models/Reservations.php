<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations
{
    protected $table = 'reservation';

    public function insert($idCar,$idCustomer,$price = 0,$pLocation,$pDate,$rLocation,$rDate,$description){
        return \DB::table($this->table)
                ->insert([
                    'id_car' => $idCar,
                    'id_customer' => $idCustomer,
                    'price' => $price,
                    'p_location' => $pLocation,
                    'p_date' => $pDate,
                    'r_location' => $rLocation,
                    'r_date' => $rDate,
                    'description' => $description
                ]);
    }

    public function getByUserId($id){
        return \DB::select("SELECT CONCAT(`l1`.`street`, ' ', `l1`.`street_number`, ' ', `l1`.`city`, ' ', `l1`.`country`) as `pLocation`, CONCAT(`l2`.`street`, ' ', `l2`.`street_number`, ' ', `l2`.`city`, ' ', `l2`.`country`) as `rLocation`, `r`.`id_reservation`, `r`.`p_date`, `r`.`r_date`, `cs`.`mobile`, `r`.`price`, `cs`.`identity_card_number` as `icn`, `r`.`description` , `c`.`brand`, `c`.`model`, `c`.`vin`, `cs`.`first_name`, `cs`.`last_name`, `cs`.`email` FROM `reservation` as `r` INNER JOIN `customers` as `cs` on `r`.`id_customer` = `cs`.`id_customer`
                INNER JOIN `cars` as `c` on `r`.`id_car` = `c`.`id_car` INNER JOIN `location` as `l1` on `r`.`p_location` = `l1`.`id_location`
                INNER JOIN `location` as `l2` on `r`.`r_location` = `l2`.`id_location` WHERE `r`.`id_customer` = ?", [$id]);
    }

    public function getAll(){
        return \DB::table($this->table.' as r')
            ->join('customers as cs', 'r.id_customer', '=', 'cs.id_customer')
            ->join('cars as c', 'r.id_car', '=', 'c.id_car')
            ->join('location as l1', 'r.p_location', '=', 'l1.id_location')
            ->join('location as l2', 'r.r_location', '=', 'l2.id_location')
            ->select('r.id_reservation', 'r.p_date', 'r.r_date', 'cs.mobile', 'r.price', 'cs.identity_card_number as icn', 'r.description' , 'c.brand', 'c.model', 'c.vin', 'cs.first_name', 'cs.last_name', 'cs.email')
            ->get();
    }

    public function show($id){
        return \DB::select("SELECT CONCAT(`l1`.`street`, ' ', `l1`.`street_number`, ' ', `l1`.`city`, ' ', `l1`.`country`) as `pLocation`, CONCAT(`l2`.`street`, ' ', `l2`.`street_number`, ' ', `l2`.`city`, ' ', `l2`.`country`) as `rLocation`, `r`.`id_reservation`, `r`.`p_date`, `r`.`r_date`, `cs`.`mobile`, `r`.`price`, `cs`.`identity_card_number` as `icn`, `r`.`description` , `c`.`brand`, `c`.`model`, `c`.`vin`, `cs`.`first_name`, `cs`.`last_name`, `cs`.`email` FROM `reservation` as `r` INNER JOIN `customers` as `cs` on `r`.`id_customer` = `cs`.`id_customer`
                INNER JOIN `cars` as `c` on `r`.`id_car` = `c`.`id_car` INNER JOIN `location` as `l1` on `r`.`p_location` = `l1`.`id_location`
                INNER JOIN `location` as `l2` on `r`.`r_location` = `l2`.`id_location` WHERE `r`.`id_reservation` = ?", [$id]);
    }
}
