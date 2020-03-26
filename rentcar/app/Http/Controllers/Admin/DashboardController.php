<?php


namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;

class DashboardController extends BaseController
{
    public function getDataFromFile($location){
        $podaci = \File::get(storage_path($location));
        $podaci = Str::of($podaci)->explode("\n");
        $niz = [];
        foreach ($podaci as $podatak){
            $delovi = Str::of($podatak)->explode(" ");
            array_push($niz,$delovi);
        }
        array_pop($niz);
        return $niz;
    }

    public function Index(){
        $activityData = $this->getDataFromFile('logs\activity.log');
        $authData = $this->getDataFromFile('logs\auth.log');
        $this->data['activity'] = $activityData;
        $this->data['autentification'] = $authData;
        return view('pages.admin.index', $this->data);
    }

    public function sortDescActivity(){
        $data = $this->getDataFromFile('logs\activity.log');
        usort($data, function ($a,$b){
                $c = strtotime($a['4']) - strtotime($b['4']);
                $c .= strtotime($a['5']) - strtotime($b['5']);
                return $c;
            }
        );

        return response()->json($data);
    }

    public function sortAscActivity(){
        $data = $this->getDataFromFile('logs\activity.log');
        usort($data, function ($a,$b){
            $c = strtotime($b['4']) - strtotime($a['4']);
            $c .= strtotime($b['5']) - strtotime($a['5']);
            return $c;
        });

        return response()->json($data);
    }

    public function sortDescAutentification(){
        $data = $this->getDataFromFile('logs\auth.log');
        usort($data, function ($a,$b){
            $c = strtotime($a['4']) - strtotime($b['4']);
            $c .= strtotime($a['5']) - strtotime($b['5']);
            return $c;
        }
        );

        return response()->json($data);
    }

    public function sortAscAutentification(){
        $data = $this->getDataFromFile('logs\auth.log');
        usort($data, function ($a,$b){
            $c = strtotime($b['4']) - strtotime($a['4']);
            $c .= strtotime($b['5']) - strtotime($a['5']);
            return $c;
        });

        return response()->json($data);
    }
}
