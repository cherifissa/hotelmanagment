<?php

namespace App\Http\Controllers\backends;

use Illuminate\Http\Request;
use App\Models\ChambreCategorie;
use App\Http\Controllers\Controller;

class ChambreCategorieController extends Controller
{
    public function infos()
    {
        return view('chambre.chambreinfos');
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
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:100',
        ]);


        $validatedData['petit_dej'] = $request->has('petit_dej') ? 1 : 0;
        $validatedData['wifi'] = $request->has('wifi') ? 1 : 0;

        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $modifiedName = 'image_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $modifiedName);
                $images[] = $modifiedName;
            }
        }

        $validatedData['images'] = json_encode($images);
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
            'nom' => 'required|in:standard,privilege,suite junior,suite famille,suite VIP,suite presidentielle|unique:chambre_categories,nom',
            'prix' => 'required|integer|unsigned',
            'wifi' => 'boolean',
            'petit_dej' => 'boolean',
            'nbr_lit' => 'required|integer|min:1',
            'images' => 'required|array',
            'description' => 'nullable|string|max:100',
        ]);
        dd($validatedData);

        $ChambreCategorie->update($validatedData);

        return redirect()->route('chambre_categories.index')
            ->with('success', 'Chambre category updated successfully.');
    }

    public function destroy($ChambreCategorieid)
    {
        $ChambreCategorie = ChambreCategorie::find($ChambreCategorieid);
        $ChambreCategorie->delete();

        return redirect()->back()->with('successDelete', 'Delete');
    }
}