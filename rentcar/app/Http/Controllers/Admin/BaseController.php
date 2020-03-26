<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->data['navigations'] = [
            [
                'title' => 'Dashboard',
                'url' => route('admin.dashboard')
            ],
            [
                'title' => 'Account manager',
                'url' => route('acc_manager.index')
            ],
            [
                'title' => 'Customers manager',
                'url' => route('customer_manager.index')
            ],
            [
                'title' => 'Reservations',
                'url' => route('reservation.index')
            ],
            [
                'title' => 'Cars manager',
                'url' => route('cars_manager.index')
            ],
            [
                'title' => 'Back to site',
                'url' => route('home')
            ]
        ];


    }
}
