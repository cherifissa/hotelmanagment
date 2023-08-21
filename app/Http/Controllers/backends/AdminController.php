<?php

namespace App\Http\Controllers\backends;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('isadmin', '<>', 'client')
            ->orderBy('id', 'desc')
            ->paginate(8);
        return view('manager.admins.index', compact('users'));
    }
}