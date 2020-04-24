<?php

use Phalcon\Mvc\Model;

class Orders extends Model
{
    public $order_id;
    public $service_id;
    public $user_id;
    public $order_total;
    public $order_date;
    public $finish_date;
    public $order_status;
    public $order_amount;
    
    public function initialize() {
        $this->setReadConnectionService('db');
        $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('Orders');
    }

    public function onConstruct() {

    }
}