<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validation des données de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Authentification de l'utilisateur
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Récupération de l'utilisateur authentifié
        $user = User::where('email', $credentials['email'])->first();
       
         // Supprimer tous les autres tokens de l'utilisateur
         $user->tokens()->delete();

         // Générer un nouveau token d'accès avec un nom spécifique
         $token = $user->createToken('Custom API Token')->plainTextToken;

        // Retourner le jeton d'authentification en réponse
        return response()->json(['message' => 'User logged in successfully', 'token' => $token]);
    }

    public function logout(Request $request)
    {
        
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'User logout']);
    }
}
