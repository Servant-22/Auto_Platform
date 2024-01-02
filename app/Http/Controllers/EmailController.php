<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WebSocketService;

class EmailController extends Controller
{
    protected $webSocketService;

    public function __construct(WebSocketService $webSocketService)
    {
        $this->webSocketService = $webSocketService;
    }

    public function showEmailForm()
    {
        return view('send_email_form');  //e-mailformulier
    }

    public function sendEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $this->webSocketService->sendEmail($validated['email'], $validated['message']);
        return back()->with('success', 'E-mail verzoek verzonden.');
    }
}
