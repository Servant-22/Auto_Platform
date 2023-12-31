<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: maintenance.proto

namespace Maintenance;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>maintenance.AppointmentResponse</code>
 */
class AppointmentResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string confirmation_id = 1;</code>
     */
    protected $confirmation_id = '';
    /**
     * Generated from protobuf field <code>string scheduled_time = 2;</code>
     */
    protected $scheduled_time = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $confirmation_id
     *     @type string $scheduled_time
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Maintenance::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string confirmation_id = 1;</code>
     * @return string
     */
    public function getConfirmationId()
    {
        return $this->confirmation_id;
    }

    /**
     * Generated from protobuf field <code>string confirmation_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setConfirmationId($var)
    {
        GPBUtil::checkString($var, True);
        $this->confirmation_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string scheduled_time = 2;</code>
     * @return string
     */
    public function getScheduledTime()
    {
        return $this->scheduled_time;
    }

    /**
     * Generated from protobuf field <code>string scheduled_time = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setScheduledTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->scheduled_time = $var;

        return $this;
    }

}

