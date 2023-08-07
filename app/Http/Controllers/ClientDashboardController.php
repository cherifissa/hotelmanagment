<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $user = session('user');
        $reservations = $user->reservations;
        return view('dashboard.dashboard', compact('reservations', 'user'));
    }
    public function disconnect()
    {
    }
}
