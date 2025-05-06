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
        // Validation des données reçues
        $validated = $request->validate([
            'id' => 'required|string', // Id du badge
            'datetime' => 'required|date', // Date et heure
        ]);

        // Essayer de trouver le badge correspondant dans la base de données
        try {
            // Rechercher le badge par son code
            $badge = Badge::where('code', $validated['id'])->first();

            if (!$badge) {
                // Si le badge n'est pas trouvé, on renvoie une réponse d'erreur
                return response()->json([
                    'message' => 'Badge introuvable',
                    'status' => 404
                ], 404);
            }

            // Si le badge existe, on met à jour son statut
            $badge->statut = 2; // Statut "synchronisé"
            $badge->last_import = $validated['datetime']; // Mettre à jour la date
            $badge->save();

            return response()->json([
                'message' => 'Badge importé avec succès',
                'status' => 200
            ]);
        } catch (\Exception $e) {
            // En cas d'erreur, on renvoie une réponse d'erreur générale
            return response()->json([
                'message' => 'Une erreur est survenue',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
