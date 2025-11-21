<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperVisorManageController extends Controller
{
    public function index()
    {
        $items = [
            [
                'id' => 1,
                'name' => 'Ramen',
                'desc' => 'Japanese noodle dish that tase salty and umami-rich with hints of sweetness',
                'price' => 85000,
                'img' => 'https://binus.ac.id/semarang/dkv/wp-content/uploads/sites/4/2024/07/1720251539839-1024x1024.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Chicken Satay',
                'desc' => 'Satay with sweet Madura sauce combine with sambal kecao',
                'price' => 95000,
                'img' => 'https://foodior.net/bandung/wp-content/uploads/sites/10/2022/09/IMG_1656.jpg'
            ],
            [
                'id' => 3,
                'name' => 'Risol Mayo',
                'desc' => 'Kinds of risol with creamy mayo sauce, egg, and smoked beef or shredded chicken',
                'price' => 55000,
                'img' => 'https://media.indozone.id/crop/0x0:0x0/images/2025/06/30/6wvBbkRZrLWj0r8GOi3v2Bjz4FsdWBBmCCiTjQAj.jpg'
            ],
        ];

        return view('SuperVisor.manage', compact('items'));
    }
}