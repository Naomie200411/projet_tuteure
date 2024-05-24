<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Interaction;
use App\Models\Promotion;
use App\Models\User;
use App\Notifications\PromotionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function sendNotif()
    {
       $interactions=Interaction::all();
       foreach($interactions as $interaction)
       {
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
         }
         
       
    }
    return response()->json('Mail envoyé');

}
}
