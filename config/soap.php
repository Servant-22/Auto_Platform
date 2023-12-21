<?php
// return [
//     'vehicleInfoService' => [
//         'wsdl' => 'http://localhost:8081/vehicleinfoservice?wsdl', // Pas de WSDL URL aan naar uw service
//         'options' => [
//             'cache_wsdl' => WSDL_CACHE_NONE,
//             'trace' => true,
//             'stream_context' => stream_context_create([
//                 'ssl' => [
//                     'verify_peer' => false,
//                     'verify_peer_name' => false,
//                 ],
//             ]),
//             'connection_timeout' => 5000,
//             'classmap' => [
//                 'GetVehicleDetailsRequest' => App\Soap\GetVehicleDetailsRequest::class,
//                 'GetVehicleDetailsResponse' => App\Soap\GetVehicleDetailsResponse::class,
//                 'VehicleDetails' => App\Soap\VehicleDetails::class,
//             ],
//         ],
//     ],
// ];


return [
    'services' => [
        'vehicleInfoService' => [
            'wsdl' => 'http://localhost:8081/vehicleinfoservice?wsdl',
            'options' => [
                'cache_wsdl' => WSDL_CACHE_NONE,
                // Andere opties...
            ],
        ],
    ],
];
