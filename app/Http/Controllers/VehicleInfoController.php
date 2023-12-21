<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Services\VehicleInfoService;
//use App\Soap\GetVehicleDetailsResponse;
use Artisaninweb\SoapWrapper\SoapWrapper;


class VehicleInfoController extends Controller
{
    protected $soapWrapper;

    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    public function getVehicleInfo($vin)
    {
        $this->soapWrapper->add('VehicleInfo', function ($service) {
            $service
                ->wsdl(config('soap.services.vehicleInfoService.wsdl'))
                ->trace(true);
        });

        $response = $this->soapWrapper->call('VehicleInfo.GetVehicleInfoAsync', ['vin' => $vin]);

        return response()->json($response);
    }
}
