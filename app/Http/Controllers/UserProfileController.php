<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = [
            'username' => 'Thomas Vendelton',
            'role' => 'USER',
            'email' => 'thomasv@gmail.com',
            'password_mask' => '************',
            'phone' => '08XX-YYY-ZZZZ',
            'created_at' => '2024/11/14 14:49',
            'last_activity' => '2025/11/14 14:49'
        ];

        return view('User.profile', compact('user'));
    }
}
