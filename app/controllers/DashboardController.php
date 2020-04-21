<?php
declare(strict_types=1);

class DashboardController extends ControllerBase
{
    public function indexAction() {
        $this->response->redirect('/dashboard/activity');
    }

    public function activityAction()
    {
        /**
         * View handling here
         */
        $this->view->setTemplateAfter('main-layout');
        $this->tag->setTitle('Aktivitas');
    }
}