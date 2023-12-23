<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class GrpcClientService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'http://localhost:50051'; // Pas dit aan naar de URL van je Go gRPC-service
    }

    public function scheduleAppointment($userId, $taskDescription, $preferredTime)
    {
        $response = Http::post("{$this->baseUrl}/schedule-appointment", [
            'user_id' => $userId,
            'task_description' => $taskDescription,
            'preferred_time' => $preferredTime,
        ]);

        return $response->json();
    }
}
