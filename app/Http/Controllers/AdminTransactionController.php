<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = [
            [
                'id' => 'U001',
                'username' => 'Linda',
                'type' => 'Online',
                'price' => 99932,
                'status' => 'Waiting',
                'payment' => 'Paid',
                'datetime' => '13/11/2025 20:52'
            ],
            [
                'id' => 'U002',
                'username' => 'Leonard',
                'type' => 'Offline',
                'price' => 83212,
                'status' => 'On Process',
                'payment' => 'COD',
                'datetime' => '13/11/2025 19:52'
            ],
            [
                'id' => 'U003',
                'username' => 'Thomas',
                'type' => 'Online',
                'price' => 25134,
                'status' => 'Done',
                'payment' => 'Paid',
                'datetime' => '13/11/2025 18:52'
            ],
            [
                'id' => 'U004',
                'username' => 'Jeanette',
                'type' => 'Offline',
                'price' => 25422,
                'status' => 'Reject',
                'payment' => 'Pending',
                'datetime' => '13/11/2025 09:52'
            ],
            [
                'id' => 'U005',
                'username' => 'Mary.1202',
                'type' => 'Online',
                'price' => 134532,
                'status' => 'Reject',
                'payment' => 'Pending',
                'datetime' => '12/11/2025 06:52'
            ],
        ];

        return view('Admin.transaction', compact('transactions'));
    }

    public function delete($id)
    {
        return redirect()->route('transaction.index')->with('success', 'Transaction deleted');
    }
}
