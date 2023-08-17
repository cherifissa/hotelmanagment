<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::orderBy('id', 'desc')->paginate(8);

        return view('manager.commentaires.index', ['commentaires' => $commentaires]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'contenu' => 'required|string',
            'client_id' => 'required',
        ]);
        $clientJson = $validatedData['client_id'];
        $client = json_decode($clientJson);

        $validatedData['client_id'] = $client->id;

        $commentaire = Commentaire::create($validatedData);
        return redirect()->route('chambre')->with('success', 'create.');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->back()->with('successDelete', 'Delete');
    }
}
