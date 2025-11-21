<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperVisororderController extends Controller
{
    public function index()
    {
        $production = [
            [
                'id' => 'PD-001',
                'name' => 'Cheddar Cheese',
                'stock' => 12,
                'status' => 'Waiting',
                'productiondate' => '2025-11-20',
                'expdate' => '2025-12-02',
                'note' => 'Needs packaging'
            ],
            [
                'id' => 'PD-002',
                'name' => 'Mozzarella Block',
                'stock' => 20,
                'status' => 'On Process',
                'productiondate' => '2025-11-21',
                'expdate' => '2025-12-10',
                'note' => 'Heating process ongoing'
            ],
            [
                'id' => 'PD-003',
                'name' => 'Cream Cheese',
                'stock' => 17,
                'status' => 'Done',
                'productiondate' => '2025-11-19',
                'expdate' => '2025-12-05',
                'note' => 'Ready to store'
            ],
            [
                'id' => 'PD-004',
                'name' => 'Milk Powder Mix',
                'stock' => 9,
                'status' => 'Reject',
                'productiondate' => '2025-11-18',
                'expdate' => '2025-11-29',
                'note' => 'Contamination detected'
            ],
        ];
        return view('SuperVisor.order', compact('production'));
    }

    public function view($id)
    {
        return back()->with('success', "Product $id viewed (dummy mode)");
    }
    
    
}
