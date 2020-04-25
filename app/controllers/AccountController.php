<?php
declare(strict_types=1);

use Phalcon\Db\Enum;
use Phalcon\Mvc\Dispatcher;

class AccountController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $titleArray = [
            'index' => 'Profil',
            'edit' => 'Edit Profil',
        ];
        $actionName = $this->dispatcher->getActionName();
        $controllerName = $this->dispatcher->getControllerName();
        
        $this->tag->setTitle($titleArray[$actionName]);
        $this->view->setTemplateAfter('main-layout');
    }
    
    public function indexAction()
    {
        
    }

    public function editAction()
    {
        
    }
}