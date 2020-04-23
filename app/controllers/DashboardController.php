<?php
declare(strict_types=1);

use Phalcon\Mvc\Dispatcher;

class DashboardController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $titleArray = [
            'index' => 'Halaman Awal',
            'activity' => 'Aktivitas',
            'latest' => 'Riwayat Terbaru',
        ];
        $actionName = $this->dispatcher->getActionName();
        
        $this->tag->setTitle($titleArray[$actionName]);
        $this->view->setTemplateAfter('main-layout');
    }
    
    public function indexAction()
    {
        $this->response->redirect('/dashboard/activity');
    }

    public function activityAction()
    {
        
    }

    public function latestAction()
    {

    }
}