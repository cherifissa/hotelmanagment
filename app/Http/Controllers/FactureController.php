<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index()
    {
        return view('manager.facture.facture');
    }

    public function generatePDF()
    {
        return view('manager.facture.facture');
    }
}
