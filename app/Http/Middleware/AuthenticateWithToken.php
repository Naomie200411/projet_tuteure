<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticateWithToken
{
    public function handle(Request $request, Closure $next)
    {
        \Illuminate\Support\Facades\Log::info('Middleware d\'authentification en cours d\'exécution...');

        // Récupérer le jeton d'authentification présent dans l'en-tête Authorization
        $token = $request->bearerToken();

        // Vérifier si un jeton correspondant est présent dans la table personal_access_tokens
        $accessToken = DB::table('personal_access_tokens')
                        ->where('token', $token)
                        ->first();

        // Si un jeton correspondant est trouvé, poursuivre le traitement de la requête
        if ($accessToken) {
            return $next($request);
        }

        // Si aucun jeton correspondant n'est trouvé, renvoyer une réponse d'erreur
        return response()->json(['message' => 'Unauthorized'], 401);
        }
}
