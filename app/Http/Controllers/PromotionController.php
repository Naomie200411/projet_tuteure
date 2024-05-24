<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionRequest;
use App\Models\Etablissement;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    public function index()
        {
            $user=Auth::user();
            $etablissement=Etablissement::where('user_id' , $user->id)->first();
            $promotions=Promotion::where('etablissement_id' , $etablissement->id)->get();
            foreach($promotions as $promotion)
            {
            $data[]=[
                'details_promo' => $promotion->details_promo,
                'date_debut' => $promotion->date_debut,
                'date_fin' => $promotion->date_fin,
                'etablissement' =>$etablissement->name,
            ];
            }
            return response()->json(['data' => $data ], 200);
        }

        public function store(PromotionRequest $request)
        {
            $user=Auth::user();
            $etablissement=Etablissement::where('user_id' , $user->id)->first();
            if($etablissement)
            {
                $promotion=new Promotion();
                $promotion->date_debut=$request->date_debut;
                $promotion->date_fin=$request->date_fin;
                $promotion->details_promo=$request->details_promo;
                $promotion->etablissement_id=$etablissement->id;

                $promotion->save();
            }else{
                return response()->json('Etablissement introuvable');
            }
           

            return response()->json(['data' => $promotion]);
            
        }

        public function update(PromotionRequest $request , $id)
        {
            $user=Auth::user();
            $etablissement=Etablissement::where('user_id' , $user->id)->first();
            $promotion=Promotion::findOrFail($id);
           // dd($promotion);
            if($etablissement)
            {
                $promotion->date_debut=$request->date_debut;
                $promotion->date_fin=$request->date_fin;
                $promotion->details_promo=$request->details_promo;
                $promotion->etablissement_id=$etablissement->id;

                $promotion->save();
            }else{
                return response()->json('Etablissement introuvable');
            }
           

            return response()->json(['data' => $promotion]);
        }

        public function destroy($id)
        {
            $promotion=Promotion::where('id' , $id)->first();
            $promotion->delete();
            return response()->json('Promotion supprimée');

        }
}
