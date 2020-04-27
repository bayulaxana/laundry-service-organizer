<?php

use Phalcon\Mvc\Model;

class OrderItem extends Model
{
    public $item_id;
    public $order_id;
    
    public function initialize() {
        $this->setReadConnectionService('db');
        $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('Order_Item');
    }

    public function onConstruct() {

    }
}