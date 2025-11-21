<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $transactions = [
            [
                'id' => 'TX-0091',
                'status' => 'Paid',
                'username' => 'Cruella',
                'date' => '13/11/2025 20:52',
                'type' => 'Online',
                'payment_method' => 'PayPal - 003834765465439TX',
                'detail_status' => 'Pending',
                'items' => [
                    [
                        'name' => 'Susu Sapi',
                        'qty' => 1,
                        'price' => 35876
                    ],
                    [
                        'name' => 'Mozzarella Cheese',
                        'qty' => 2,
                        'price' => 78162
                    ]
                ],
                'total' => 192200
            ],
        ];

        return view('Admin.index', compact('transactions'));
    }
}
