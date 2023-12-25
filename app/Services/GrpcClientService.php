<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Generated\Maintenance\MaintenanceServiceClient;
use App\Generated\Maintenance\AppointmentRequest;
use Spiral\RoadRunner\GRPC;

class GrpcClientService
{
    protected $baseUrl;
    protected $client;


    public function __construct()
    {
        //$this->baseUrl = 'http://localhost:50051'; // Pas dit aan naar de URL van je Go gRPC-service
        $this->client = new MaintenanceServiceClient('localhost:50051', [
            'credentials' => GRPC\ChannelCredentials::createInsecure(),
        ]);
    }

    // public function scheduleAppointment($userId, $taskDescription, $preferredTime)
    // {
    //     $response = Http::post("{$this->baseUrl}/schedule-appointment", [
    //         'user_id' => $userId,
    //         'task_description' => $taskDescription,
    //         'preferred_time' => $preferredTime,
    //     ]);

    //     return $response->json();
    // }
    public function scheduleAppointment($userId, $taskDescription, $preferredTime)
    {
        $request = new AppointmentRequest();
        $request->setUserId($userId);
        $request->setTaskDescription($taskDescription);
        $request->setPreferredTime($preferredTime);

        list($response, $status) = $this->client->ScheduleAppointment($request)->wait();
        if ($status->code !== GRPC\STATUS_OK) {
            throw new \Exception("gRPC request failed: " . $status->details);
        }

        return $response;
    }
}
