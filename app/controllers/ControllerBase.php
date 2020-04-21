<?php
declare(strict_types=1);

use Phalcon\Db\Adapter\AdapterInterface;
use Phalcon\Mvc\Controller;

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
}
