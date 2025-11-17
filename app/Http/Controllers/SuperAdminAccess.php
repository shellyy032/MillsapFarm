<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminAccessController extends Controller
{
    public function index(Request $request)
    {
        $roleCounts = [
            'user' => 21,
            'admin' => 3,
            'kurir' => 5,
            'supervisor' => 4
        ];

        $roles = ['Admin','Supervisor','Kurir','User'];

        $currentRole = $request->role ?? 'Admin';

        $modules = ['Produk','Transaksi','Stok','Laporan'];

        $permissions = [
            'Admin' => [
                'Produk'     => ['create'=>true,'read'=>true,'update'=>true,'delete'=>false],
                'Transaksi'  => ['create'=>false,'read'=>true,'update'=>false,'delete'=>false],
                'Stok'       => ['create'=>true,'read'=>true,'update'=>false,'delete'=>false],
                'Laporan'    => ['create'=>false,'read'=>true,'update'=>false,'delete'=>false]
            ],
            'Supervisor' => [],
            'Kurir'      => [],
            'User'       => []
        ];

        return view('SuperAdmin.access', compact(
            'roleCounts',
            'roles',
            'currentRole',
            'modules',
            'permissions'
        ));
    }

    public function update(Request $request)
    {
        return back()->with('success','Hak akses diupdate.');
    }

    public function superadmin()
    {
        return view('access.superadminaccess');
    }
}
