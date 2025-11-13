<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControlController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (! $user || ($user->role ?? '') !== 'admin') {
            return redirect('/')->with('error', 'Access denied.');
        }
        return view('control');
    }
}
