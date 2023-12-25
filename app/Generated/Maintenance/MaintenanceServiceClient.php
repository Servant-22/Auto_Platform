<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Maintenance;

/**
 */
class MaintenanceServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Maintenance\AppointmentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ScheduleAppointment(\Maintenance\AppointmentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/maintenance.MaintenanceService/ScheduleAppointment',
        $argument,
        ['\Maintenance\AppointmentResponse', 'decode'],
        $metadata, $options);
    }

}
