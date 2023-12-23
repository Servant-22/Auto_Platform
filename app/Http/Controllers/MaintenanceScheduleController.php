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

    public function schedule(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'task_description' => 'required',
            'preferred_time' => 'required',
        ]);

        //try{
            $response = $this->grpcClientService->scheduleAppointment(
                $validatedData['user_id'],
                $validatedData['task_description'],
                $validatedData['preferred_time']
            );
            dd($response);
            return view('grpc.scheduled', ['response' => $response]);
        //} catch (\Exception $e) {
       //     return back()->withErrors(['error' => $e->getMessage()]);
       // }  
    }
}
