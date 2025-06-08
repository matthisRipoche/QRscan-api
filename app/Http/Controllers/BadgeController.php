<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            'id' => 'required|string',
            'datetime' => 'required|date',
            'event_id' => 'required|exists:events,id'
        ]);

        try {
            // Rechercher le badge par son code et son event_id
            $badge = Badge::where('code', $validated['id'])->where('event_id', $validated['event_id'])->first();

            if (!$badge) {
                return response()->json([
                    'message' => 'Badge introuvable pour le code ' . $validated['id'] . ' et l\'event ' . $validated['event_id'],
                    'status' => 404
                ], 404);
            }


            return response()->json([
                'message' => 'Badge trouvé avec le code ' . $badge->code . ' et l\'event ' . $badge->event_id,
                'status' => 404
            ], 404);

            // Mise à jour des infos du badge
            $badge->statut = 2;
            $badge->last_import = Carbon::parse($validated['datetime']);
            $badge->save();

            return response()->json([
                'message' => 'Badge importé avec succès',
                'badge' => $badge,
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
