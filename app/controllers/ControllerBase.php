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

        // Set the default flash session class
        $this->flashSession->setCssClasses([
            'error'   => 'ui message inverted red small',
            'success' => 'ui message inverted green small',
            'notice'  => 'ui message inverted blue small',
            'warning' => 'ui message inverted yellow small',
        ]);
        $this->flashSession->setAutoescape(false);
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

    public static function getFormattedFlashOutput(
        string $header, array $messageList,
        string $status = 'success');
    {
        $headerStr =    '<i class="close icon"></i>
                        <div class="header">' . $header . '</div>';
        if (count($messageList) == 1) {
            $list = '<p>' . $messageList[0] '</p>'
        }
        else {
            $list = '<ul class="list">';
            foreach ($messageList as $msg) {
                $list .= '<li>' . $msg . '</li>';
            }
            $list .= '</ul>';
        }

        switch ($status) {
            case 'succes':
                $result = '<div class="ui message inverted green small">' . $headerStr . $list .  '</div>';
                break;
            case 'info':
                $result = '<div class="ui message inverted blue small">' . $headerStr . $list .  '</div>';
                break;
            case 'danger':
                $result = '<div class="ui message inverted red small">' . $headerStr . $list .  '</div>';
                break;
            case 'warning':
                $result = '<div class="ui message inverted yellow small">' . $headerStr . $list .  '</div>';
                break;
        }

        return $result;
    }
}
