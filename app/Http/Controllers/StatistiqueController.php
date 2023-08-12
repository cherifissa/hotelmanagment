<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;

class StatistiqueController extends Controller
{
    public function index()
    {
        $recipient = 'recipient@example.com';
        $subject = 'Test Email Subject';
        $content = 'This is a test email content.';

        // Mail::raw($content, function ($message) use ($recipient, $subject) {
        //     $message->to($recipient)
        //         ->subject($subject);
        // });

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