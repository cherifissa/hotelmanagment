<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $users = User::where('isadmin', 'client')->paginate(6);
        return view('manager.clients.index', compact('users'));
    }

    public function indexclt()
    {
        $users = User::where('isadmin', 'client')->paginate(6);
        return view('manager.restaurants.indexclt', compact('users'));
    }
}
