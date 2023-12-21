<?php

namespace App\Soap;

class GetVehicleDetailsResponse
{
    public $vin;
    public $make;
    public $model;
    public $year;
    public $color;
    // Voeg hier andere eigenschappen toe die uw SOAP-service teruggeeft

    // U kunt ook een constructor toevoegen om deze eigenschappen te initialiseren
    public function __construct($data)
    {
        $this->vin = $data['vin'] ?? null;
        $this->make = $data['make'] ?? null;
        $this->model = $data['model'] ?? null;
        $this->year = $data['year'] ?? null;
        $this->color = $data['color'] ?? null;
        // Initialiseer hier andere eigenschappen
    }
}
