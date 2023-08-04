<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeReservation;

class DemandeReservationController extends Controller
{
    public function index()
    {
        $demandes = DemandeReservation::paginate(6);
        return view('manager.demandes.index', compact('demandes'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_client' => 'required|string',
            'email_client' => 'required|email',
            'tel_client' => 'required|numeric',
            'date_arrive' => 'required|date',
            'date_depart' => 'required|date|after:date_arrive',
            'type_chambre' => 'in:standard,privilege,suite junior,suite VIP',
            'nombre_adulte' => 'required|integer|min:1',
            'nombre_enfant' => 'required|integer|min:0',
        ]);

        $demandeReservation =  DemandeReservation::create($validatedData);

        return redirect()->route('accueil')->with('success', 'successfully');
    }
}
