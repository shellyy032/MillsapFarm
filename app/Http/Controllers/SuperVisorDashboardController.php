<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperVisorDashboardController extends Controller
{
    public function index()
    {
        $products = [
            [
                'id' => 'PR-037',
                'name' => 'Cheddar Cheese',
                'stock' => 8,
                'status' => 'Product is in verge of out of stock. Please stock up immediately !'
            ],
            [
                'id' => 'PR-044',
                'name' => 'Mozzarella Block',
                'stock' => 5,
                'status' => 'Stock is running low!'
            ]
        ];
        
        $reports = [
            [
                'id' => 'RP-001',
                'datetime' => '13/11/2025 20:52',
                'judul' => 'Oven mengalami overheat',
                'deskripsi' => 'Temperatur naik tiba tiba, mesin nyala tapi tidak stabil takut banget loh tbtb DUARRRRRR',
                'divisi' => 'Pizza',
                'status' => 'Butuh pengecekan teknisi',
                'foto' => null
            ]
        ];
        
        return view('SuperVisor.index', compact('products', 'reports'));
    }
}
