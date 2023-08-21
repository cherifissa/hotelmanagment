<?php

namespace App\Http\Controllers\backends;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $user = session('client');
        $reservations = $user->reservations;
        return view('dashboard.dashboard', compact('reservations', 'user'));
    }
}