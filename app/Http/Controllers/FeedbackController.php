<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;  // Zorg ervoor dat dit model bestaat en correct is ingesteld

class FeedbackController extends Controller
{
    public function processFeedback(Request $request, $email)
    {
        // Haal de feedbackscore op van de URL-queryparameter
        $score = $request->query('score');

        // Voeg de nieuwe feedbackscore toe aan de database
        $feedback = Feedback::updateOrCreate(
            ['email' => $email],  // Zoekcriteria
            ['score' => $score]   // Waarden om te updaten of aan te maken
        );

        // Bereken de nieuwe gemiddelde score
        $averageScore = Feedback::avg('score');

        // Je kunt hier code toevoegen om de gemiddelde score ergens op te slaan
        // bijvoorbeeld in een andere database tabel of in cache

        // Stuur de gebruiker door naar een bedankpagina of geef een response terug
        return view('feedback_thankyou', ['averageScore' => $averageScore]);
    }
}

