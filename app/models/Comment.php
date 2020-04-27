<?php

use Phalcon\Mvc\Model;

class Comment extends Model
{
    public $comment_id;
    public $user_id;
    public $comment_status;
    public $comment_content;
    public $comment_date;
    public $order_id;   
    
    public function initialize() {
        $this->setReadConnectionService('db');
        $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('Comment');
    }

    public function onConstruct() {

    }
}