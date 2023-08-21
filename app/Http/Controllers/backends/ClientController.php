<?php

namespace App\Http\Controllers\backends;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $users = User::where('isadmin', 'client')
            ->orderBy('id', 'desc')
            ->paginate(8);
        return view('manager.clients.index', compact('users'));
    }

    public function indexclt()
    {
        $users = User::where('isadmin', 'client')
            ->orderBy('id')
            ->paginate(6);
        return view('manager.restaurants.indexclt', compact('users'));
    }
}