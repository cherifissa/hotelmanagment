<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('isadmin', '<>', 'client')->get();
        return view('manager.admins.index', compact('users'));
    }
}
