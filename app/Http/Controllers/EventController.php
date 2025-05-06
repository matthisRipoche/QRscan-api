<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Récupérer tous les événements
    public function index(Request $request)
    {
        try {
            // Ici on va récupérer les événements depuis la base de données
            $events = Event::all();

            // Retourner les événements en JSON
            return response()->json($events);
        } catch (\Exception $e) {
            // En cas d'erreur, on renvoie une erreur 500
            return response()->json(['error' => 'Erreur lors de la récupération des événements.'], 500);
        }
    }
}
