<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Reservation;
use App\Models\Service;

class StatistiqueController extends Controller
{
    public function index()
    {
        $expenseData = Reservation::select('date_arrive')
            ->selectRaw('sum(prix) as total_expense')
            ->groupBy('date_arrive')
            ->orderBy('date_arrive')
            ->get();

        $service = Service::select('created_at')
            ->selectRaw('sum(prix) as total_expense')
            ->groupBy('created_at')
            ->orderBy('created_at')
            ->get();

        return view('manager.statistiques.statistique', compact('expenseData', 'service'));
    }
}