<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMyOrderController extends Controller
{
    public function index()
    {
        // DATA DUMMY
        $orders = [
            [
                'image' => '/mnt/data/bf26a4fe-1cbd-4847-aec2-1685cf6fe13d.png',
                'name' => 'SNACK COMBO 1',
                'qty' => 1,
                'type' => 'DAIRY',
                'price' => 80000,
                'shipping' => 10000,
                'total' => 45876,
                'status_payment' => 'Paid',
                'invoice' => 'PDY-152363844956',
                'method' => 'PayPal',
                'shipping_steps' => [
                    'Waiting For Confirmation',
                    'Driver has been set up',
                    'Driver On The Way',
                    'Done'
                ]
            ]
        ];

        return view('User.myorder', compact('orders'));
    }
}
