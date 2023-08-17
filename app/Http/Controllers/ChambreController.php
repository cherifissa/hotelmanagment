<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    public function index()
    {
        $chambres = Chambre::paginate(6);

        return view('manager.chambres.index', compact('chambres'));
    }

    public function create()
    {
        return view('manager.chambres.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric|max:9999|unique:chambres,id',
            'type' => 'required|in:standard,privilege,suite junior,suite famille,suite VIP,suite presidentielle',
            'prix' => 'required|numeric|max:999999',
            'status' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);
        $chambre = Chambre::create($validatedData);
        return redirect()->route('chambres.index')->with('success', 'create');
    }

    public function edit(Chambre $chambre)
    {
        return view('manager.chambres.edit', compact('chambre'));
    }

    public function update(Request $request, Chambre $chambre)
    {
        $validatedData = $request->validate([
            'type' => 'required|in:standard,privilege,suite junior,suite famille,suite VIP,suite presidentielle',
            'prix' => 'required|numeric|max:999999',
            'status' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);
        $chambre->update($validatedData);
        return redirect()->route('chambres.index')->with('success', 'update');
    }

    public function destroy(Chambre $chambre)
    {
        $chambre->delete();
        return redirect()->route('chambres.index')->with('successDelete', 'delete');
    }
}
