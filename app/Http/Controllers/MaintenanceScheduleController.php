<?php

namespace App\Http\Controllers;

use App\Services\GrpcClientService;
use Illuminate\Http\Request;

class MaintenanceScheduleController extends Controller
{
    protected $grpcClientService;

    public function __construct(GrpcClientService $grpcClientService)
    {
        $this->grpcClientService = $grpcClientService;
    }

    public function create()
    {
        return view('grpc.schedule');
    }

    public function scheduleAppointment(Request $request)
    {
        try {
            $response = $this->grpcClientService->scheduleAppointment(
                $request->input('userId'),
                $request->input('taskDescription'),
                $request->input('preferredTime')
            );
    
            // // Voorbereiden van variabelen voor de view
            // $appointmentDetails = [
            //     'confirmationId' => $response->getConfirmationId(),
            //     'scheduledTime' => $response->getScheduledTime(),
            //     // Andere relevante details...
            // ];
    
            // return view('grpc.scheduled', compact('appointmentDetails'));
            return view('grpc.scheduled', ['response' => $response]);
    
        } catch (\Exception $e) {
            // Hier kan je kiezen om een foutmelding te tonen in een view, of een foutpagina.
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}
