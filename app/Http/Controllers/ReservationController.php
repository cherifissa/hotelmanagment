<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Chambre;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('created_at', 'desc')->paginate(8);
        return view('manager.reservations.index', ['reservations' => $reservations]);
    }
    public function indexrsv()
    {
        $reservations = Reservation::paginate(6);
        return view('manager.restaurants.indexrsv', ['reservations' => $reservations]);
    }
    public function create()
    {
        $users = User::all();
        $chambres = Chambre::where('status', '=', 'libre')->get();
        return view('manager.reservations.create', ['users' => $users, 'chambres' => $chambres]);
    }
    public function store(Request $request)
    {
        // Validate the input data from the request
        $validatedData = $request->validate([
            'nbr_jour' => 'required|integer|min:1',
            'nbr_client' => 'required|integer|min:1',
            'status' => 'required|in:attente,enregistre',
            'date_arrive' => 'required|date|before:date_depart',
            'date_depart' => 'required|date|after:date_arrive',
            'client_id' => 'required|exists:users,id',
            'chambre_id' => 'required|exists:chambres,id',
        ]);

        $chambre = Chambre::find($validatedData["chambre_id"]);
        $today = Carbon::today();
        $arrival = Carbon::parse($validatedData["date_arrive"]);
        if ($arrival->isSameDay($today)) {
            $chambre->status = 'occupé';
            $chambre->save();
        }
        $validatedData["prix"] = $chambre->prix * $validatedData["nbr_jour"];
        //dd($arrival->isSameDay($today));
        $validatedData["numero"] = $this->generateUniqueNumero();

        $reservation = Reservation::create($validatedData);
        $url = Route::current()->uri;
        $segments = explode('/', $url);
        $firstSegment = $segments[0];

        if ($firstSegment == 'admin') {
            $prefix = 'admin';
        } else {
            $prefix = 'recept';
        }

        $route = '/' . $prefix . "/reservations";
        return Redirect::to($route)->with('success', 'successfully');
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
            'nbr_jour' => 'required|integer|min:1',
            'status' => 'required|in:annule,quitte,attente,enregistre',
            'date_arrive' => 'required|date|before:date_depart',
            'date_depart' => 'required|date|after:date_arrive',
        ]);
        $chambre = Chambre::find($reservation->chambre_id);
        $today = Carbon::today();
        $arrival = Carbon::parse($validatedData["date_arrive"]);
        if ($arrival->isSameDay($today)) {
            $chambre->status = 'occupé';
            $chambre->save();
        }


        $url = Route::current()->uri;
        $segments = explode('/', $url);
        $firstSegment = $segments[0];

        if ($firstSegment == 'admin') {
            $prefix = 'admin';
        } else {
            $prefix = 'recept';
        }
        $route = '/' . $prefix . "/reservations";
        $reservation->update($validatedData);

        return Redirect::to($route)->with('successUpdate', 'successfully');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->back()->with('successDelete', 'Delete');
    }
}
