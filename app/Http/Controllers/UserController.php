<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function createUser(Request $request)
    {

        $user = new User;

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->user_type = $request->user_type;

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
}
