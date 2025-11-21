<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index()
    {
        $totalRevenue = 169000;
        $pending = 30;
        $done = 1938;
        $reject = 35;
        $totalPendapatan = 1234249;

        $bestSeller = [
            ['icon' => '📍', 'name' => 'PIZZA PEPPERONI', 'qty' => 500],
            ['icon' => '🏪', 'name' => 'MOZARELLA', 'qty' => 350],
            ['icon' => '🌼', 'name' => 'FLOWER BOUQUET', 'qty' => 150]
        ];

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
        $salesData = [120, 150, 90, 180, 200, 170];
        $revenues = [100000, 120000, 140000, 90000, 110000, 150000];
        $transactions = [
            ['id' => 'TX-0001', 'user' => 'John Doe', 'status' => 'Paid', 'amount' => 45000, 'date' => '2025-01-10'],
            ['id' => 'TX-0002', 'user' => 'Sarah Chen', 'status' => 'Pending', 'amount' => 38000, 'date' => '2025-01-12'],
            ['id' => 'TX-0003', 'user' => 'Michael Tan', 'status' => 'Cancelled', 'amount' => 0, 'date' => '2025-01-13'],
        ];

        return view('Admin.report', compact(
            'totalRevenue',
            'pending',
            'done',
            'reject',
            'totalPendapatan',
            'bestSeller',
            'months',
            'salesData',
            'transactions',
            'revenues'
        ));
    }

}
