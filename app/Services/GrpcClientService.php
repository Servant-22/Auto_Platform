<?php
namespace App\Services;

use Grpc\ChannelCredentials;
use Maintenance\MaintenanceServiceClient;
use Maintenance\AppointmentRequest;
use Illuminate\Support\Facades\Http;

class GrpcClientService
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'http://localhost:9090'; // URL van uw Go-service
        
    }

    public function scheduleAppointment($userId, $taskDescription, $preferredTime)
    {
        $response = Http::post("{$this->baseUrl}/schedule-appointment", [
            'userId' => $userId,
            'taskDescription' => $taskDescription,
            'preferredTime' => $preferredTime,
        ]);

        if ($response->failed()) {
            throw new \Exception("HTTP request failed: " . $response->status());
        }

        return $response->json();
    }
}
