<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AuthenticateWithToken;
use App\Http\Requests\EtablissementRequest;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\Interaction;
use App\Models\Promotion;
use App\Models\User;
use App\Notifications\PromotionNotification;
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

         // Enregistrer automatiquement une interaction dans la base de données
        $interaction = new Interaction();
        $interaction->user_id = Auth::user()->id; // Récupérer l'ID de l'utilisateur actuellement authentifié
        $interaction->etablissement_id = $etablissement->id;
        $interaction->date_visite = now(); // Date actuelle
        $interaction->save();

        $user=User::where('id' , $interaction->user_id)->first();
        $etablissement=Etablissement::where('id' , $interaction->etablissement_id)->first();
       // dd($etablissement);
        $promotions = Promotion::where('etablissement_id' , $etablissement->id)->get();
        foreach($promotions as $promotion)
        {
           //dd($promotion);

           if ($user) {
               $name=$etablissement->name;
               $date_debut=$promotion->date_debut;
               $date_fin=$promotion->date_fin;
               $details_promo=$promotion->details_promo;
               
              /* Mail::raw("L'établissement : $etablissement->name fait une promotion du $promotion->date_debut au $promotion->date_fin. Voici les détails de la promotion : $promotion->details_promo", function ($message) use ($user) {
                   $message->to($user->email)
                           ->subject(' Super Promotion!!');
               });*/
               $user->notify(new PromotionNotification($name,$date_debut,$date_fin,$details_promo));

          }
        return response()->json(['data' => $etablissement , 'interaction' => $interaction], 200);
    }
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
