<?php
declare(strict_types=1);

use Phalcon\Db\Adapter\AdapterInterface;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Tag;

class ControllerBase extends Controller
{
    protected AdapterInterface $dbConnection;
    
    public function initialize()
    {
        // Database connection
        $this->dbConnection = $this->getDI()->get('db');
        
        // Global Styling
        $this->assets->addCss('css/global-style.css');
    }

    public function getFormattedFlashOutput(string $header, array $messageList)
    {
        $headerStr =    '<i class="close icon"></i>
                        <div class="header">' . $header . '</div>';
        if (count($messageList) == 1) {
            return $headerStr . '<p>' . $messageList[0] . '</p>';
        }
        else {
            $list = '<ul class="list">';
            foreach ($messageList as $msg) {
                $list .= '<li>' . $msg . '</li>';
            }
            $list .= '</ul>';
            
            return $headerStr . $list;
        }
    }
}
