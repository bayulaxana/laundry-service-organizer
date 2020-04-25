<?php

use Phalcon\Mvc\Model;

class Item extends Model
{
    public $item_id;
    public $user_id;
    public $item_details;
    public $item_type;
    public $item_image;
    
    public function initialize() {
        $this->setReadConnectionService('db');
        $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('Item');
    }

    public function onConstruct() {

    }
}