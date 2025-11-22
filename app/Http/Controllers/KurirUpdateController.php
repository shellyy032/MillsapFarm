<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KurirUpdateController extends Controller
{
    public function index()
    {
        $transactions = [
            [
                'name' => 'CRUELLA',
                'phone' => '08XX-YYYY-ZZZZ',
                'item' => '1 Susu Sapi + 2 Mozarella Cheese',
                'notes' => 'Notes: Lorem ipsum dolor sit amet consectetur adipiscing elit',
                'price' => 192200,
                'status' => 'On Trip',
                'image' => '/images/flower1.jpg',
            ],
            [
                'name' => 'LALISA',
                'phone' => '08XX-YYYY-ZZZZ',
                'item' => '1 Susu Sapi + 2 Mozarella Cheese',
                'notes' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit',
                'price' => 192200,
                'status' => 'On Trip',
                'image' => '/images/flower2.jpg',
            ],
            [
                'name' => 'MARY-1202',
                'phone' => '08XX-YYYY-ZZZZ',
                'item' => '1 Susu Sapi + 2 Mozarella Cheese',
                'notes' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit',
                'price' => 192200,
                'status' => 'Reject',
                'image' => '/images/flower3.jpg',
            ],
        ];

        return view('Kurir.update', compact('transactions'));
    }
}
