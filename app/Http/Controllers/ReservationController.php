<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Chambre;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::paginate(6);
        return view('manager.reservations.index', ['reservations' => $reservations]);
    }
    public function create()
    {
        $users = User::all();
        $chambres = Chambre::all();
        return view('manager.reservations.create', ['users' => $users, 'chambres' => $chambres]);
    }
    public function store(Request $request)
    {
        // Validate the input data from the request
        $validatedData = $request->validate([
            'nbr_jour' => 'required|integer',
            'status' => 'required|in:checkin,checked,annule,pending',
            'date_arrive' => 'required|date',
            'date_depart' => 'required|date|after:date_arrive',
            'client_id' => 'required',
            'chambre_id' => 'required',
        ]);

        $validatedData["numero"] = $this->generateUniqueNumero();

        $reservation = Reservation::create($validatedData);

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function generateUniqueNumero()
    {
        $randomNumber = mt_rand(1000000000, 999999999999);

        $unique = false;
        $prefix = 'RES';

        do {
            $numero = $prefix . $randomNumber;

            $existingReservation = Reservation::where('numero', $numero)->exists();

            if (!$existingReservation) {
                $unique = true;
            } else {
                $randomNumber = mt_rand(1000000000, 9999999999);
            }
        } while (!$unique);

        return $numero;
    }

    public function edit(Reservation $reservation)
    {
        return view('manager.reservations.edit', compact('reservation'));
    }


    public function update(Request $request, Reservation $reservation)
    {
        $validatedData = $request->validate([
            'nbr_jour' => 'required|integer',
            'status' => 'required|in:checkin,checked,annule',
            'date_arrive' => 'required|date',
            'date_depart' => 'required|date|after:date_arrive',
            'client_id' => 'required',
            'chambre_id' => 'required',
        ]);

        $reservation->update($validatedData);

        return redirect()->route('reservations.index')->with('successUpdate', 'Reservation updated successfully.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('successDelete', 'Reservation deleted successfully.');
    }
}
