<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Voeg deze regel toe

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('maintenance');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        // Valideer de binnenkomende verzoekgegevens
        $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            // Maak de gebruiker aan
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            // Log de gebruiker in
            Auth::login($user);

            // Redirect naar een bepaalde route na succesvolle registratie
            return redirect()->route('dashboard'); // Zorg ervoor dat deze route bestaat

        } catch (\Exception $e) {
            // Log eventuele uitzonderingen
            Log::error('Error in Register method: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Er is een fout opgetreden tijdens het registreren.']);
        }
        

        // // Log dat de methode is aangeroepen
        // Log::info('Register method called');

        // // Log de binnenkomende verzoekgegevens
        // Log::info('Request Data: ', $request->all());

        // // Valideer de binnenkomende verzoekgegevens
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        // // Log de gevalideerde gegevens
        // Log::info('Validated Data: ', $validatedData);

        // try {
        //     // Maak de gebruiker aan
        //     $user = User::create([
        //         'name' => $validatedData['name'],
        //         'email' => $validatedData['email'],
        //         'password' => bcrypt($validatedData['password']),
        //     ]);

        //     // Log de ID van de aangemaakte gebruiker
        //     Log::info('User created: ', ['id' => $user->id]);

        //     // Log de gebruiker in
        //     Auth::login($user);

        //     // Redirect naar een bepaalde route na succesvolle registratie
        //     return redirect()->route('dashboard'); // Zorg ervoor dat deze route bestaat
        // } catch (\Exception $e) {
        //     // Log eventuele uitzonderingen
        //     Log::error('Error in Register method: ' . $e->getMessage());
        //     return back()->withErrors(['error' => 'Er is een fout opgetreden tijdens het registreren.']);
        // }

        // return redirect()->route('maintenance');
    }
}
