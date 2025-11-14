<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminReportController extends Controller
{
    public function index()
{
    $products = [
        ['id' => 1, 'nama' => 'Pisang', 'harga' => 15000, 'stok' => 120],
        ['id' => 2, 'nama' => 'Mangga', 'harga' => 20000, 'stok' => 80],
        ['id' => 3, 'nama' => 'Bunga Mawar', 'harga' => 35000, 'stok' => 45],
    ];

    $divisions = [
        ['id' => 1, 'nama' => 'Manager Bunga', 'jumlah_staff' => 4],
        ['id' => 2, 'nama' => 'Manager Pizza', 'jumlah_staff' => 6],
        ['id' => 3, 'nama' => 'Manager Online Shop', 'jumlah_staff' => 5],
    ];

    $transactions = [
        ['id'=>101,'produk'=>'Pisang','jumlah'=>5,'total'=>75000,'tanggal'=>'2025-01-02'],
        ['id'=>102,'produk'=>'Bunga Mawar','jumlah'=>2,'total'=>70000,'tanggal'=>'2025-01-03'],
    ];

    $logs = [
        ['id'=>1,'aksi'=>'Login','user'=>'Admin A','waktu'=>'2025-01-01 10:10'],
        ['id'=>2,'aksi'=>'Delete User','user'=>'SuperAdmin','waktu'=>'2025-01-03 12:20'],
    ];

    return view('report.index', compact('products', 'divisions', 'transactions', 'logs'));
}


    public function product()
    {
        // Dummy data dulu
        $products = [
            ['id' => 1, 'nama' => 'Pisang', 'harga' => 15000, 'stok' => 120],
            ['id' => 2, 'nama' => 'Mangga', 'harga' => 20000, 'stok' => 80],
            ['id' => 3, 'nama' => 'Bunga Mawar', 'harga' => 35000, 'stok' => 45],
        ];

        return view('report.product', compact('products'));
    }

    public function division()
    {
        $divisions = [
            ['id' => 1, 'nama' => 'Manager Bunga', 'jumlah_staff' => 4],
            ['id' => 2, 'nama' => 'Manager Pizza', 'jumlah_staff' => 6],
            ['id' => 3, 'nama' => 'Manager Online Shop', 'jumlah_staff' => 5],
        ];

        return view('report.division', compact('divisions'));
    }

    public function transaction()
    {
        $transactions = [
            ['id'=>101,'produk'=>'Pisang','jumlah'=>5,'total'=>75000,'tanggal'=>'2025-01-02'],
            ['id'=>102,'produk'=>'Bunga Mawar','jumlah'=>2,'total'=>70000,'tanggal'=>'2025-01-03'],
        ];

        return view('report.transaction', compact('transactions'));
    }

    public function activity()
    {
        $logs = [
            ['id'=>1,'aksi'=>'Login','user'=>'Admin A','waktu'=>'2025-01-01 10:10'],
            ['id'=>2,'aksi'=>'Delete User','user'=>'SuperAdmin','waktu'=>'2025-01-03 12:20'],
        ];

        return view('report.activity', compact('logs'));
    }
}
