<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisaninweb\SoapWrapper\SoapWrapper;

class VehicleDetailsController extends Controller
{
    protected $soapWrapper;

    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    public function index()
    {
        return view('vehicle/vehicle_search');
    }

    public function getVehicleData(Request $request)
    {
        $vin = $request->input('vin');

        $this->soapWrapper->add('VehicleService', function ($service) {
            $service
                ->wsdl('http://localhost:5243/VehicleInformationService.asmx?wsdl')
                ->trace(true);
        });

        $response = $this->soapWrapper->call('VehicleService.GetVehicleData', [['vin' => $vin]]);

        // Log de response om de structuur te controleren
        logger()->info('SOAP Response:', (array) $response);        

        return view('vehicle/vehicle_details', ['vehicle' => $response]);


    }

}
