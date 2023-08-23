<?php

namespace App\Http\Controllers\backends;

use App\Models\Chambre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChambreCategorie;

class ChambreController extends Controller
{
    public function index()
    {
        $chambres = Chambre::paginate(8);

        return view('manager.chambres.index', compact('chambres'));
    }

    public function create()
    {
        $categories = ChambreCategorie::all();
        return view('manager.chambres.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric|max:9999|unique:chambres,id',
            'status' => 'required|in:occupé,libre,hors service',
            'categorie_id' => 'required|exists:chambre_categories,id',
        ]);

        $chambre = Chambre::create($validatedData);
        return redirect()->route('chambres.index')->with('success', 'create');
    }

    public function edit(Chambre $chambre)
    {
        $categories = ChambreCategorie::all();
        return view('manager.chambres.edit', compact('chambre', 'categories'));
    }

    public function update(Request $request, Chambre $chambre)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric|max:9999|unique:chambres,id,' . $chambre->id,
            'status' => 'required|in:occupé,libre,hors service',
            'categorie_id' => 'required|exists:chambre_categories,id',
        ]);

        $chambre->update($validatedData);
        return redirect()->route('chambres.index')->with('success', 'update');
    }

    public function destroy(Chambre $chambre)
    {
        $chambre->delete();
        return redirect()->back()->with('successDelete', 'Delete');
    }
}
