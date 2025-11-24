<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserHistoryController extends Controller
{
    public function index()
    {
        $orders = [
            [
                'id' => 1,
                'date' => '2025-11-17 21:52',
                'total' => 45678,
                'status' => 'Order Has Been Sent'
            ],
            [
                'id' => 2,
                'date' => '2025-11-16 21:52',
                'total' => 45678,
                'status' => 'Order Has Been Sent'
            ],
            [
                'id' => 3,
                'date' => '2025-11-16 21:52',
                'total' => 45678,
                'status' => 'Order Has Been Sent'
            ]
        ];

        return view('user.history', compact('orders'));
    }
}
