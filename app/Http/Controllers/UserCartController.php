<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCartController extends Controller
{
    public function index()
    {
        $cart = [
            [
                'id' => 1,
                'name' => 'SNACK COMBO 1',
                'image' => '/images/veggies.jpg',
                'type' => 'DAIRY',
                'price' => 80000,
                'qty' => 2,
                'shipping' => 10000,
                'total' => 45876
            ],
            [
                'id' => 2,
                'name' => 'SNACK COMBO 1',
                'image' => '/images/veggies.jpg',
                'type' => 'DAIRY',
                'price' => 80000,
                'qty' => 1,
                'shipping' => 10000,
                'total' => 45876
            ],
            [
                'id' => 3,
                'name' => 'SNACK COMBO 1',
                'image' => '/images/veggies.jpg',
                'type' => 'DAIRY',
                'price' => 80000,
                'qty' => 3,
                'shipping' => 10000,
                'total' => 45876
            ],
        ];

        return view('User.cart', compact('cart'));
    }
}
