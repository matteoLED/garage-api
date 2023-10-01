<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsedVehicle;
use Illuminate\Support\Facades\Validator;

class UsedVehicleController extends Controller
{
    public function createUsedVehicle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required',
            'year_circulation' => 'required',
            'mileage' => 'required',
            'price' => 'required',
            'description' => 'required',
            'equipment' => 'required',
            'image_vehicle' => 'required',
            'vehicle_management' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $usedVehicle = UsedVehicle::create($request->all());

        return response()->json([
            "message" => "used Vehicle created",
            "data" => $usedVehicle
        ], 201);
    }

    public function getUsedVehicles()
    {
        $usedVehicles = UsedVehicle::all();

        if ($usedVehicles->isEmpty()) {
            return response()->json(['message' => 'Aucun Véhicule d\'occasion trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'service' => 'UsedVehicles API',
            'message' => 'Listes des usedVehicles',
            'usedVehicles' => $usedVehicles,
        ], 200);
    }

    public function getUsedVehicleById($id)
    {
        $usedVehicle = UsedVehicle::find($id);

        if (!$usedVehicle) {
            return response()->json([
                'success' => false,
                'message' => 'UsedVehicle introuvable'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'UsedVehicle trouvé',
            'data' => $usedVehicle
        ]);
    }

    public function updateUsedVehicle(Request $request, $id)
    {
        $usedVehicle = UsedVehicle::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'brand' => 'required',
            'year' => 'required',
            'mileage' => 'required',
            'price' => 'required',
            'description' => 'required',
            'equipment' => 'required',
            'image_vehicle' => 'required',
            'vehicle_management' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $usedVehicle->update($request->all());

        return response()->json(['message' => 'UsedVehicle mis à jour avec succès', 'data' => $usedVehicle], 200);
    }

    public function deleteUsedVehicle($id)
    {
        $usedVehicle = UsedVehicle::find($id);

        if (!$usedVehicle) {
            return response()->json([
                'success' => false,
                'message' => 'UsedVehicle introuvable'
            ], 404);
        }

        $usedVehicle->delete();

        return response()->json([
            'success' => true,
            'message' => 'UsedVehicle supprimé',
            'data' => $usedVehicle
        ], 200);
    }
}
