<?php

use Phalcon\Mvc\Model;

class Service extends Model
{
    public $service_id;
    public $service_name;
    public $service_photo;
    public $service_price;
    public $service_unit_scheme;
    public $service_code;
    
    public function initialize() {
        $this->setReadConnectionService('db');
        $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('Service');
    }

    public function onConstruct() {

    }
}