<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminAccessController extends Controller
{
    public function index(Request $request)
{
    $roleCounts = [
        'user' => User::where('role', 'User')->count(),
        'admin' => User::where('role', 'Admin')->count(),
        'kurir' => User::where('role', 'Kurir')->count(),
        'supervisor' => User::where('role', 'Supervisor')->count(),
    ];

    return view('access', compact('roleCounts'));
}
}