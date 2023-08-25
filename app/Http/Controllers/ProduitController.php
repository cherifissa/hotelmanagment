<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('manager.restaurants.index', ['produits' => $produits]);
    }

    public function create()
    {

        return view('manager.reservations.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'image' => 'required',
        ]);

        $produit = Produit::create($validatedData);
        return redirect()->route('produit.index')->with('success', 'update');
    }

    public function edit(Produit $produit)
    {
        return view('manager.reservations.edit', compact('reservation'));
    }


    public function update(Request $request, Produit $produit)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'image' => 'required',
        ]);

        $produit->update($validatedData);

        return redirect()->back()->with('successUpdate', 'successfully');
    }

    public function destroy(Produit $produit)
    {

        return redirect()->back()->with('successDelete', 'Delete');
    }
}
