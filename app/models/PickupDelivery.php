<?php

use Phalcon\Mvc\Model;

class PickupDelivery extends Model
{
    public $pd_id;
    public $order_id;
    public $pd_status;
    public $pd_driver;
    public $pd_type;
    public $pd_time_est;
    public $user_id;
    
    public function initialize() {
        $this->setReadConnectionService('db');
        $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('Pickup_Delivery');
    }

    public function onConstruct() {

    }
}