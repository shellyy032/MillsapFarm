<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperVisorProductionController extends Controller
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

        return view('SuperVisor.production', compact('production'));
    }

    public function add(Request $request)
    {
        return back()->with('success', 'Production added (dummy mode)');
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        return response()->json([
            'deleted' => $ids,
            'message' => 'Items deleted'
        ]);
    }

    public function update(Request $request, $id)
    {
        return back()->with('success', "Product $id updated (dummy mode)");
    }
}
