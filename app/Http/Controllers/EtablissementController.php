<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AuthenticateWithToken;
use App\Http\Requests\EtablissementRequest;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use Illuminate\Support\Facades\Auth;

class EtablissementController extends Controller
{

    public function index()
    {
        $etablissements = Etablissement::all();
        return response()->json(['data' => $etablissements], 200);
    }

    public function show($id)
    {
        $etablissement = Etablissement::findOrFail($id);
        return response()->json(['data' => $etablissement], 200);
    }
    public function store(EtablissementRequest $request)
    {
        // Valider les données de la requête en utilisant la demande EtablissementRequest
        $validatedData = $request->validated();

        // Créer une nouvelle instance de Etablissement avec les données validées
        $etablissement = new Etablissement();
        $etablissement->name = $validatedData['name'];
        $etablissement->image = $validatedData['image'];
        $etablissement->adresse = $validatedData['adresse'];
        $etablissement->contact = $validatedData['contact'];
        $etablissement->name_proprio = $validatedData['name_proprio'];
        $etablissement->validate_status = $validatedData['validate_status'];
        $etablissement->note_moy = $validatedData['note_moy'];
        $etablissement->user_id = Auth::user()->id;
        
        //dd($etablissement);
        // Enregistrer l'établissement dans la base de données
        $etablissement->save();

        // Retourner une réponse JSON avec l'établissement créé et le code de statut HTTP 201 (Created)
        return response()->json(['data' => $etablissement], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string',
            'image' => 'nullable|string',
            'adresse' => 'string',
            'contact' => 'string',
            'name_proprio' => 'string',
            'validate_status' => 'string',
            'note_moy' => 'numeric',
        ]);

        $etablissement = Etablissement::findOrFail($id);
        $etablissement->update($request->all());

        return response()->json(['data' => $etablissement], 200);
    }

    public function destroy($id)
    {
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->delete();

        return response()->json(null, 204);
    }
}
