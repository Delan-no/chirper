<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
 
    public function index()
    {
        return view("chirps.index", [
            'chirps' => Chirp::orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        // envoyer les données en BDD
        $request->user()->chirps()->create($validated);
        // rediriger sur chirps.index
        return redirect(route('chirps.index'));
    }

    public function show(Chirp $chirp)
    {
        //
    }

    public function edit(Chirp $chirp)
    {
        return view('chirps.edit', ['chirp' => $chirp]);
    }

    public function update(Request $request, Chirp $chirp)
    {
        // vérifier que l'utilisateur a l'autorization de mettre à jour le commentaire
        $this->authorize('update', $chirp);
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $chirp->update($validated);
 
        return redirect(route('chirps.index'));
    }

    public function destroy(Chirp $chirp)
    {
        // vérifier l'autroisation du user
        $this->authorize('delete', $chirp);
        // supprimer la resource
        $chirp->delete();
        // rediriger vers la page des commentaires
        return redirect(route('chirps.index'));
    }
    
}
