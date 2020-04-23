<?php
declare(strict_types=1);

class OrderController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $titleArray = [
            'index'     => 'Daftar Pesanan',
            'detail'    => 'Detail Pesanan',
        ];
        $actionName = $this->dispatcher->getActionName();
        $controllerName = $this->dispatcher->getControllerName();
        
        $this->tag->setTitle($titleArray[$actionName]);
        $this->view->setTemplateAfter('main-layout');
    }

    public function indexAction()
    {
        
    }

    public function detailAction()
    {

    }
}

