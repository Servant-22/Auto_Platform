<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserPreferenceController extends Controller
{
    protected $graphqlServiceUrl = 'http://localhost:4000/graphql';

    public function getUserPreferences($userId)
    {
        $query = <<<GQL
        query {
            getUserPreferences(userId: "$userId") {
                id
                userId
                notificationFrequency
                communicationChannel
            }
        }
        GQL;

        $response = Http::post($this->graphqlServiceUrl, ['query' => $query]);
        return view('user_preferences', ['preferences' => $response->json(), 'userId' => $userId]);
    }

    public function updateUserPreferences(Request $request, $userId)
    {
        $input = $request->only(['notificationFrequency', 'communicationChannel']);
        $query = <<<GQL
        mutation {
            updateUserPreferences(input: {
                userId: "$userId",
                notificationFrequency: "{$input['notificationFrequency']}",
                communicationChannel: "{$input['communicationChannel']}"
            }) {
                id
                userId
                notificationFrequency
                communicationChannel
            }
        }
        GQL;

        $response = Http::post($this->graphqlServiceUrl, ['query' => $query]);

        dd($input);

        dd($response->json());

        return back()->with('success', 'Preferences updated successfully!');
    }

    public function test()
    {
        return response()->json(['message' => 'UserPreferenceController is successfully called']);
    }
}
