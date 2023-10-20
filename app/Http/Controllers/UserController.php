<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function createUser(Request $req)
    {

        $user = new User;

        $user->firstname = $req->firstname;
        $user->lastname = $req->lastname;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->user_type = $req->user_type;

        $user->save();

        return response()->json([
            "message" => "user created",
            "data" => $user
        ], 201);
    }

    public function getUsers()
    {
        $users = User::all();


        if ($users->isEmpty()) {
            return response()->json(['message' => 'Aucun utilisateur trouvé'], 404);
        }
        return response()->json([
            'success' => true,
            'service' => 'Users API',
            'message' => 'Listes des utilisateurs',
            'users' => $users,
        ], 200);
    }

    public function getUserById($user_id)
    {
        $user = User::find($user_id);


        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User introuvable'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'User trouvé',
            'data' => $user
        ]);
    }

    public function updateUser(Request $req,$user_id)
    {
        $user = User::find($user_id);


        $validator = Validator::make($req->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user->update($req->all());

        return response()->json([
            'message' => 'User mis à jour avec succès',
            'data' => $user
        ], 200);
    }

    public function deleteUser($user_id)
    {

        $user = User::find($user_id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User introuvable'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User supprimé',
            'data' => $user
        ]);
    }


    public function adminCreateEmployees(Request $req)
    {
        // Vérifiez si l'utilisateur est un administrateur
        if ($req->user() && $req->user()->user_type === 'administateur') {
            $user = new User;

            $user->firstname = $req->firstname;
            $user->lastname = $req->lastname;
            $user->email = $req->email;
            $user->password = $req->password;
            $user->user_type = $req->user_type;

            $user->save();

            return response()->json([
                "message" => "Utilisateur créé avec succès",
                "data" => $user
            ], 201);
        } else {
            return response()->json([
                "message" => "Accès non autorisé. Vous devez être un administrateur pour créer des comptes.",
            ], 403); // 403 signifie "Accès interdit"
        }
    }

}
