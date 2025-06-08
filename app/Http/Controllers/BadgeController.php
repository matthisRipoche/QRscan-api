<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    /**
     * Handle the badge import.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function import(Request $request)
    {

        return response()->json([
            'message' => 'Données reçues',
            'data' => $request->all(),
            'headers' => $request->headers->all()
        ]);


        // Validation des données reçues
        $validated = $request->validate([
            'id' => 'required|string',
            'datetime' => 'required|date',
        ]);

        try {
            $badge = Badge::where('code', $validated['id'])->first();

            if (!$badge) {
                return response()->json([
                    'message' => 'Badge introuvable',
                    'status' => 404
                ], 404);
            }

            // Mise à jour des infos du badge
            $badge->statut = 2;
            $badge->last_import = $validated['datetime'];
            $badge->save();

            return response()->json([
                'message' => 'Badge importé avec succès',
                'status' => 200
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
