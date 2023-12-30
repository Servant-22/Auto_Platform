<?php
namespace App\Services;

use Grpc\ChannelCredentials;
use Maintenance\MaintenanceServiceClient;
use Maintenance\AppointmentRequest;
use Illuminate\Support\Facades\Http;

class GrpcClientService
{
    private $baseUrl;
    protected $client;

    public function __construct()
    {
        $this->baseUrl = 'http://localhost:50051';
        
        // $this->client = new MaintenanceServiceClient('localhost:50051', [
        //     'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        // ]);
        
    }

    // public function scheduleAppointment($userId, $taskDescription, $preferredTime)
    // {
    //     $request = new AppointmentRequest();
    //     $request->setUserId($userId);
    //     $request->setTaskDescription($taskDescription);
    //     $request->setPreferredTime($preferredTime);

    //     list($response, $status) = $this->client->ScheduleAppointment($request)->wait();
    //     if ($status->code !== \Grpc\STATUS_OK) {
    //         throw new \Exception("gRPC request failed: " . $status->code);
    //     }

    //     return $response;
    // }

    // public function __destruct()
    // {
    //     $this->client->close();
    // }

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
