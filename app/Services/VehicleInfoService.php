<?php
namespace App\Services;

use Artisaninweb\SoapWrapper\SoapWrapper;
use App\Soap\VehicleDetails;


class VehicleInfoService
{
    protected $soapWrapper;

    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    public function getVehicleDetails($vehicleId)
    {
        $response = null;

        $this->soapWrapper->add('VehicleInfo', function ($service) {
            $service
                ->wsdl(config('soap.vehicleInfoService.wsdl')) // Gebruik de WSDL uit de configuratie
                ->trace(true)
                ->classmap([
                    'VehicleDetails' => VehicleDetails::class,
                ]);
        });

        // $this->soapWrapper->service('VehicleInfo', function ($service) use ($vehicleId, &$response) {
        //     $response = $service->call('GetVehicleDetails', [
        //         'vehicleId' => $vehicleId,
        //     ]);
        // });

        // Gebruik de 'call' methode direct na het toevoegen van de service
        $response = $this->soapWrapper->call('VehicleInfo.GetVehicleDetails', [
            'vehicleId' => $vehicleId,
        ]);

        return $response;
    }
}
