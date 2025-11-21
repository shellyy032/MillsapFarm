<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminDashboardController extends Controller
{
    public function index()
    {
        $role = 'superadmin'; 
        return view('SuperAdmin.index', [
            'role' => $role
        ]);
    }
}
