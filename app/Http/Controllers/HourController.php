<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HourController extends Controller
{
    public function getHour()
    {
        $horaires = Hour::all();

        if ($horaires->isEmpty()) {
            return response()->json(['message' => 'Aucun horaire trouvé'], 404);
        }
        return response()->json(['data' => $horaires]);
    }

    public function createHour(Request $request)
    {
        $request->validate([
            'day' => 'required',
            'open_hour' => 'required',
            'close_hour' => 'required',
        ]);

        $horaire = Hour::create($request->all());

        

        return response()->json(['message' => 'Horaire créé avec succès', 'data' => $horaire], 201);
    }

    public function getHourById(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'day' => 'required',
            'open_hour' => 'required',
            'close_hour' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $horaire = Hour::create($request->all());
        return response()->json(['data' => $horaire], 201);
    }

    public function updateHour(Request $request, $id)
    {
        $horaire = Hour::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'day' => 'required',
            'open_hour' => 'required',
            'close_hour' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $horaire->update($request->all());
        return response()->json(['data' => $horaire]);
    }

    public function deleteHour($id)
    {
        $horaire = Hour::findOrFail($id);
        $horaire->delete();
        return response()->json(['message' => 'Horaire supprimé avec succès']);
    }
}
