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
            session(['client' => $user]);
            return redirect()->intended();
        } else {
            // Invalid email or password, handle the authentication failure
            return back()->withErrors(['erreur' => 'Email ou mot de passe invalide'])
                ->withInput(['email']);
        }
    }
    public function disconnect()
    {
        session(['user' => null]);
        session(['client' => null]);
        return redirect()->route('accueil');
    }
}