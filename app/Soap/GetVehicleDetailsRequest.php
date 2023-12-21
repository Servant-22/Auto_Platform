<?php
// app/Soap/GetVehicleDetailsRequest.php
namespace App\Soap;

class GetVehicleDetailsRequest
{
    public $vin;

    public function __construct($vin)
    {
        $this->vin = $vin;
    }
}
