<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Service;
use App\Models\Reservation;

class FactureController extends Controller
{
    public function index(Reservation $reservation)
    {
        $currentDate = Carbon::now();

        $date = "le " . $currentDate->format('d/m/Y');
        $client = User::find($reservation->client_id);
        $services = Service::where('reservation_id', $reservation->numero)
            ->get()
            ->groupBy('type_service')
            ->map(function ($group) {
                return [
                    'services' => $group,
                    'quantity' => count($group),
                    'totalPrice' => $group->sum('prix'),
                    'name' => $this->getServiceTypeName($group->first()->type_service)
                ];
            })
            ->values()
            ->toArray();

        $totalPrixFromServices = collect($services)->pluck('totalPrice')->sum();
        $totalprix = $reservation->prix + $totalPrixFromServices;
        return view('manager.facture.facture', compact('client', 'services', 'reservation', 'date', 'totalprix', 'totalPrixFromServices'));
    }

    private function getServiceTypeName($type)
    {
        $typeNames = [
            'ptdej' => 'petit déjeuner',
            'dej' => 'déjeuner',
            'diner' => 'dinner'
        ];

        return $typeNames[$type] ?? $type; // Return the full name or the original type if not found
    }
}
