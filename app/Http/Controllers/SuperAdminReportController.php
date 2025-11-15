<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminReportController extends Controller
{
    public function index()
    {
        $products = [
            ['id' => 1, 'nama' => 'Pisang', 'kategori'=>'Buah', 'harga' => 15000, 'stok' => 120, 'status'=>'Available'],
            ['id' => 2, 'nama' => 'Mangga', 'kategori'=>'Buah', 'harga' => 20000, 'stok' => 80, 'status'=>'Available'],
            ['id' => 3, 'nama' => 'Bunga Mawar', 'kategori'=>'Bunga', 'harga' => 35000, 'stok' => 45, 'status'=>'Out of Stock'],
        ];

        return view('report.index', compact('products'));
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'status' => 'required|string'
        ]);

        $newProduct = [
            'id' => rand(100,999),
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'status' => $request->status
        ];

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }
}
