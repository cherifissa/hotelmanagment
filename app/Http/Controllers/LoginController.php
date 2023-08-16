<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    public function login(Request $request)
    {
        $validatedate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $validatedate['email'])->first();

        if ($user && Hash::check($validatedate['password'], $user->password)) {
            if ($user->isadmin == 'client') {
                session(['client' => $user]);
                return redirect()->intended('/');
            } elseif ($user->isadmin == 'admin') {
                session(['admin' => $user]);
                return redirect()->intended('/admin');
            } elseif ($user->isadmin == 'recept') {
                session(['recept' => $user]);
                return redirect()->intended('/recept');
            } elseif ($user->isadmin == 'server') {
                session(['server' => $user]);
                return redirect()->intended('/restaurant');
            }
            return redirect()->intended();
        } else {
            return back()->withErrors(['erreur' => 'Email ou mot de passe incorrect'])
                ->withInput(['email']);
        }
    }
    public function disconnect($userid)
    {
        $user = User::find($userid);

        // dd($user->isadmin);
        if ($user->isadmin == 'client') {
            session(['client' => null]);
            return redirect()->intended('/');
        } elseif ($user->isadmin == 'admin') {
            session(['admin' => null]);
            return redirect()->intended('/login');
        } elseif ($user->isadmin == 'recept') {
            session(['recept' => null]);
            return redirect()->intended('/login');
        } elseif ($user->isadmin == 'server') {
            session(['server' => null]);
            return redirect()->intended('/login');
        }
    }
}
