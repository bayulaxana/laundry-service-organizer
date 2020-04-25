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
        // Find order by the user id
        $orders = Orders::find(
            [
                'conditions' => 'user_id = :user_id:',
                'bind' => [
                    'user_id' => $this->session->auth['id'],
                ]
            ]
        )->toArray();

        // Calculation
        $orderCount     = count($orders);
        $activeOrder    = 0;
        $finishedOrder  = 0;
        $waitingOrder   = 0;
        foreach ($orders as $order) {
            if ($order['order_status'] == 'Sedang Dikerjakan') {
                $activeOrder++;
            }
            else if ($order['order_status'] == 'Sudah Selesai') {
                $finishedOrder++;
            }
            else if ($order['order_status'] == 'Menunggu Barang') {
                $waitingOrder++;
            }
        }
        
        // Send it to view
        $this->view->setVar('orderDetail', [
            'orderCount' => $orderCount,
            'activeOrder' => $activeOrder,
            'finishedOrder' => $finishedOrder,
            'waitingOrder' => $waitingOrder,
        ]);
    }

    public function latestAction()
    {

    }
}