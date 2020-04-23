<?php

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $user_id;
    public $username;
    public $password;
    public $name;
    public $gender;
    public $address;
    public $register_date;
    public $role;
    public $phone;
    public $email;
    public $profile_img;
    
    public function initialize() {
        $this->setReadConnectionService('db');
        $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('Users');
    }

    public function onConstruct() {

    }
}