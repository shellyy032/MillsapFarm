<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminReportController extends Controller
{
    public function index(Request $request)
    {
        $currentRole = $request->query('role', 'PRODUK');
        $produk = [
            [
                'id_produk' => 101,
                'nama_produk' => 'Pisang Cavendish',
                'kategori' => 'Buah',
                'harga' => 25000,
                'status' => 'Available',
            ],
            [
                'id_produk' => 102,
                'nama_produk' => 'Mangga Harum Manis',
                'kategori' => 'Buah',
                'harga' => 30000,
                'status' => 'Out of Stock',
            ],
        ];
        $transaksi = [
            [
                'id_transaksi' => 5001,
                'user' => 'Alice',
                'tanggal' => '2025-01-12',
                'total' => 55000,
                'admin' => 'Admin A',
                'status' => 'Selesai'
            ],
            [
                'id_transaksi' => 5002,
                'user' => 'Bob',
                'tanggal' => '2025-01-14',
                'total' => 75000,
                'admin' => 'Admin B',
                'status' => 'Diproses'
            ],
        ];
        $divisi = [
            [
                'id_divisi' => 1,
                'nama_divisi' => 'Gudang',
                'penanggung_jawab' => 'Budi',
                'jumlah_staf' => 12,
                'status' => 'Active'
            ],
            [
                'id_divisi' => 2,
                'nama_divisi' => 'Keuangan',
                'penanggung_jawab' => 'Sari',
                'jumlah_staf' => 6,
                'status' => 'Inactive'
            ],
        ];

        $riwayat = [
            [
                'waktu' => '2025-01-10 12:00:00',
                'user' => 'SuperAdmin',
                'aksi' => 'Add New Product',
                'target' => 'Pisang Cavendish'
            ],
            [
                'waktu' => '2025-01-11 09:12:45',
                'user' => 'Admin A',
                'aksi' => 'Update Stock',
                'target' => 'Mangga Harum Manis'
            ],
        ];

        return view('SuperAdmin.report', compact(
            'currentRole',
            'produk',
            'transaksi',
            'divisi',
            'riwayat'
        ));
}

    public function addProduct(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = [
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'status' => $request->status
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('produk'), $name);
            $data['image'] = $name;
        }

        Produk::create($data);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

}
