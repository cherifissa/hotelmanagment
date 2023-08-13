<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('manager.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|unique:users|max:255',
            'adresse' => 'required|string|max:255',
            'isadmin' => 'required|in:admin,recept,client,server',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create($validatedData);

        if ($user->isadmin == "client") {
            $route = "clients.index";
        } else {
            $route = "admins.index";
        }

        return redirect()->route($route)->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('manager.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'adresse' => 'required|string|max:255',
            'isadmin' => 'required|in:admin,recept,client,server',
            'password' => 'required|string|min:6',
        ]);

        if ($user->isadmin == "client") {
            $route = "clients.index";
        } else {
            $route = "admins.index";
        }

        $user->update($validatedData);

        return redirect()->route($route)->with('success', 'successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
