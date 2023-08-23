<?php

namespace App\Http\Controllers\backends;

use Illuminate\Http\Request;
use App\Models\ChambreCategorie;
use App\Http\Controllers\Controller;

class ChambreCategorieController extends Controller
{
    public function infos(Request $request)
    {
        $chambreValue = $request->route('chambre');

        $chambreCategorie = ChambreCategorie::where('nom', $chambreValue)->first();
        $images = json_decode($chambreCategorie->images);

        //dd(json_decode($chambreCategorie->images));

        return view('chambre.chambreinfos', compact('chambreCategorie', 'images'));
    }
    public function index()
    {
        $categories = ChambreCategorie::paginate(8);
        return view('manager.chambre_categories.index', compact('categories'));
    }
    public function create()
    {
        return view('manager.chambre_categories.create');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nom' => 'required|in:standard,privilege,suite junior,suite famille,suite VIP,suite presidentielle|unique:chambre_categories,nom',
            'prix' => 'required|integer',
            'nbr_lit' => 'required|integer|min:1',
            'nbr_chb' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);
        $validatedData['petit_dej'] = $request->has('petit_dej') ? 1 : 0;
        $validatedData['wifi'] = $request->has('wifi') ? 1 : 0;


        //dd($validatedData);
        $chambreCategorie = ChambreCategorie::create($validatedData);

        return redirect()->route('chambre_categories.index')->with('success', 'Chambre category created successfully.');
    }

    public function edit($ChambreCategorieid)
    {
        $ChambreCategorie = ChambreCategorie::find($ChambreCategorieid);
        return view('manager.chambre_categories.edit', compact('ChambreCategorie'));
    }

    public function update(Request $request, ChambreCategorie $ChambreCategorie)
    {

        $validatedData = $request->validate([
            'nom' => 'required|in:standard,privilege,suite junior,suite famille,suite VIP,suite presidentielle|unique:chambre_categories,id,' . $ChambreCategorie->id,
            'prix' => 'required|integer',
            'nbr_lit' => 'required|integer|min:1',
            'nbr_chb' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);
        $validatedData['petit_dej'] = $request->has('petit_dej') ? 1 : 0;
        $validatedData['wifi'] = $request->has('wifi') ? 1 : 0;

        //dd($validatedData);
        $ChambreCategorie->update($validatedData);

        return redirect()->route('chambre_categories.index')
            ->with('successUpdate', 'Chambre category updated successfully.');
    }

    public function destroy($ChambreCategorieid)
    {
        $ChambreCategorie = ChambreCategorie::find($ChambreCategorieid);
        $ChambreCategorie->delete();

        return redirect()->back()->with('successDelete', 'Delete');
    }
}
