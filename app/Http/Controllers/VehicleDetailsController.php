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
        return view('vehicles/vehicle_search');
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

        // Zet de response om naar een PHP-object als het een JSON-string is
        $vehicleData = json_decode(json_encode($response), false);
        // Dump de response om de structuur te controleren
        //dd($response); // Dit zal de uitvoering onderbreken en de response tonen


        // Log de response om de structuur te controleren
        logger()->info('SOAP Response:', (array) $response);        

        return view('vehicles/vehicle_details', ['vehicle' => $vehicleData]);

    }

}
