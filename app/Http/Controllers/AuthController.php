<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
use App\Models\User;
use Dotenv\Validator;

use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{


    public function login(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $password = $request->input('password');

        if ($user->password == $password) {
            return response()->json([
                'message' => 'Connexion réussie',
                'user' => $user,
                'usertype' => $user->user_type,
            ], 200);
        }

        // Les informations d'identification sont incorrectes
        return response()->json([
            'message' => 'Unauthorized',
            'errors' => 'Les informations d\'identification fournies sont incorrectes.',
        ], 401);
    }






    public function logout(Request $request)
    {


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Déconnexion réussie'], 200);
    }
}
