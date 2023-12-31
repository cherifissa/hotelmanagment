<?php

namespace App\Http\Controllers\backends;

use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->paginate(6);
        return view('manager.services.index', ['services' => $services]);
    }
    public function create()
    {
        $reservations = Reservation::all();
        return view('manager.services.create', ['reservations' => $reservations]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type_service' => 'required|in:ptdej,dej,diner',
            'type_payement' => 'required|in:cash,gratuite,reservation',
            'prix' => 'required|numeric',
            'reservation_id' => 'exists:reservations,numero',
        ]);
        $service = Service::create($validatedData);
        return redirect()->route('services.index')->with('success', 'successfully');
    }
    public function edit(Service $service)
    {
        return view('manager.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'type_payement' => 'required|in:cash,gratuite,reservation',
            'prix' => 'required|numeric',
            'reservation_id' => 'required',
        ]);

        $service->update($validatedData);

        return redirect()->route('services.index')->with('successUpdate', 'successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->back()->with('successDelete', 'Delete');
    }
}