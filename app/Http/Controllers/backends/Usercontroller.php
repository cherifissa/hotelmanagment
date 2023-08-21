<?php

namespace App\Http\Controllers\backends;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function create()
    {
        return view('manager.users.create');
    }

    public function store(Request $request)
    {
        dd($request);
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|unique:users|max:255',
            'adresse' => 'required|string|max:255',
            'isadmin' => 'required|in:admin,recept,client,server',
            'type_piece' => 'required|in:cni,passeport,carte consulaire',
            'numero_piece' => 'required|string|max:15',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create($validatedData);
        if ($user->isadmin == "client") {
            $route = "clients.index";
        } else {
            $route = "admins.index";
        }

        $url = Route::current()->uri;
        $segments = explode('/', $url);
        $firstSegment = $segments[0];

        if ($firstSegment == 'admin') {
            $prefix = 'admin';
        } else {
            $prefix = 'recept';
        }

        // return Redirect::to($url);

        // return redirect()->route($route)->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('manager.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        if ($user->isadmin == "client") {
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'tel' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'adresse' => 'required|string|max:255',
                'type_piece' => 'required|in:cni,passeport,carte consulaire',
                'numero_piece' => 'required|string|max:15',
            ]);
        } else {
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'tel' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'adresse' => 'required|string|max:255',
                'type_piece' => 'required|in:cni,passeport,carte consulaire',
                'numero_piece' => 'required|string|max:15',
                'isadmin' => '|in:admin,recept,server',
            ]);
        }
        $url = Route::current()->uri;
        $segments = explode('/', $url);
        $firstSegment = $segments[0];

        if ($firstSegment == 'admin') {
            $prefix = 'admin';
        } else {
            $prefix = 'recept';
        }

        if ($user->isadmin == "client") {
            $route = '/' . $prefix . "/clients";
        } else {
            $route = '/' . $prefix . "/admins";
        }
        $user->update($validatedData);

        return Redirect::to($route)->with('success', 'successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('successDelete', 'Delete');
    }
}
