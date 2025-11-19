<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminConstraintController extends Controller
{
    public function index(Request $request)
    {
        $currentRole = $request->role ?? 'ADMIN';

        $roleCounts = [
            'USER' => 21,
            'ADMIN' => 3,
            'KURIR' => 5,
            'SUPERVISOR' => 4
        ];

        $kendala = [
            [
                'id' => 'C001',
                'divisi' => 'Admin',
                'tanggal' => '17/01/2025',
                'judul' => 'Masalah Login',
                'deskripsi' => 'Tidak bisa login ke sistem karena error autentikasi.',
                'foto' => 'https://via.placeholder.com/150'
            ],
            [
                'id' => 'C002',
                'divisi' => 'Kurir',
                'tanggal' => '17/01/2025',
                'judul' => 'Alamat Tidak Ditemukan',
                'deskripsi' => 'Kurir kesulitan menemukan alamat tujuan.',
                'foto' => 'https://via.placeholder.com/150'
            ],
            [
                'id' => 'C003',
                'divisi' => 'Supervisor',
                'tanggal' => '18/01/2025',
                'judul' => 'Laporan Sistem Lambat',
                'deskripsi' => 'Sistem sering lag saat memuat data.',
                'foto' => 'https://via.placeholder.com/150'
            ]
        ];

        return view('SuperAdmin.constraint', compact('currentRole', 'roleCounts', 'kendala'));
    }
}
