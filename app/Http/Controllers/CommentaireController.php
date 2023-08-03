<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        // Retrieve all clients from the database
        $commentaires = Commentaire::all();

        // Pass the clients data to the view for displaying
        return view('manager.commentaires.index', ['clients' => $commentaires]);
    }

    public function create()
    {
        // Show the form to create a new client
        return view('commentaire.create');
    }

    public function store(Request $request)
    {
        // Validate the input data from the request
        $validatedData = $request->validate([
            'id_client' => 'required|string',
            'text' => 'required|string',

        ]);

        $client = Commentaire::create($validatedData);
        return redirect()->route('accueil')->with('success', 'create.');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('clients.index')->with('successDelete', 'delete');
    }
}
