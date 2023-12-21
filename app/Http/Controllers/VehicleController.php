<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Vehicle; // Voeg dit toe bovenaan je controller
use App\Services\SoapVehicleService; // Voeg dit toe
use App\Services\VehicleInfoService;
use Illuminate\Support\Facades\Http;


class VehicleController extends Controller
{
    // protected $soapVehicleService;

    // public function __construct(VehicleInfoService $soapVehicleService)
    // {
    //     $this->soapVehicleService = $soapVehicleService;
    // }

    public function index()
    {
        $vehicles = Vehicle::all();
        return view('maintenance', ['vehicles' => $vehicles]);
        // If you need to pass data to your view, you would query your database here.
        // return view('maintenance'); // This should be the name of your Blade template file.
    }

    public function store(Request $request)
    {
        $vehicleData = $request->only(['make', 'model', 'year']);

        $client = new Client();
        $pythonServiceUrl = env('PYTHON_SERVICE_URL', 'http://localhost:5000') . '/add-vehicle';

        $pythonResponse = $client->request('POST', $pythonServiceUrl, ['json' => $vehicleData]);

            
        if ($pythonResponse->getStatusCode() == 200) {
            // Ruby Service Integration
            $rubyServiceUrl = env('RUBY_SERVICE_BASE_URL', 'http://localhost:3000') . '/vehicles';
            $rubyResponse = Http::post($rubyServiceUrl, $vehicleData);

            if ($rubyResponse->successful()) {
                // Save vehicle data in Laravel's database
                $vehicle = new Vehicle();
                $vehicle->make = $vehicleData['make'];
                $vehicle->model = $vehicleData['model'];
                $vehicle->year = $vehicleData['year'];
                $vehicle->save();

                // Send reminder message to Python service
                $reminderMessage = "Maintenance reminder for " . $vehicleData['make'] . " " . $vehicleData['model'] . " " . $vehicleData['year'];
                $client->request('POST', env('PYTHON_SERVICE_URL', 'http://localhost:5000') . '/send-reminder', ['json' => ['message' => $reminderMessage]]);

                return back()->with('success', 'Vehicle successfully added!');
            } else { 
                return back()->withErrors('Failed to add vehicle to Ruby service.');
            }
        } else {
            return back()->withErrors('Failed to add vehicle to Python service.');
        }

        // $vehicle = $this->soapVehicleService->getVehicleInformation($id);
        // return view('vehicle.show', compact('vehicle'));
    }

    // public function getVehicleDetails($id)
    // {
    //     try {
    //         // Ophalen van voertuigdetails via de SOAP-service
    //         $vehicleDetails = $this->soapVehicleService->getVehicleDetails($id);
    
    //         // Controleer of de response geldige gegevens bevat
    //         if ($vehicleDetails) {
    //             // Retourneer de voertuigdetails als JSON
    //             return response()->json(['success' => true, 'details' => $vehicleDetails]);
    //         } else {
    //             // Geen gegevens gevonden
    //             return response()->json(['success' => false, 'message' => 'No vehicle details found for the provided ID.']);
    //         }
    //     } catch (\Exception $e) {
    //         // Foutafhandeling
    //         return response()->json(['success' => false, 'error' => 'Failed to retrieve vehicle details: ' . $e->getMessage()], 500);
    //     }
    // }
    

    //ruby
    public function show($id)
    {
        $response = Http::get(env('RUBY_SERVICE_BASE_URL') . "/vehicles/{$id}");

        if ($response->successful()) {
            $vehicle = $response->json();
            return view('vehicle.show', compact('vehicle'));
        } else {
            return back()->withErrors('Something went wrong.');
        }
    }
    //---------------------------------------------
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('edit_vehicle', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $vehicleData = $request->only(['make', 'model', 'year']);
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($vehicleData);

        return redirect()->route('maintenance.index')->with('success', 'Vehicle updated successfully!');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('maintenance.index')->with('success', 'Vehicle deleted successfully!');
    }

}
