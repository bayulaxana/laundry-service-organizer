<?php
declare(strict_types=1);

use Phalcon\Filter;
use Phalcon\Mvc\Dispatcher;

class PickupDeliveryController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $titleArray = [
            'delivery' => 'Delivery',
            'newDelivery' => 'Delivery Baru',
        ];
        $actionName = $this->dispatcher->getActionName();
        
        $this->tag->setTitle($titleArray[$actionName]);
        $this->view->setTemplateAfter('main-layout');
    }

    public function deliveryAction()
    {
        $this->response->redirect('/order');
    }

    public function newDeliveryAction()
    {       
        if ($this->request->hasQuery('ordnum')) {
            $order_id = $this->request->getQuery('ordnum', Filter::FILTER_STRIPTAGS);
            
            // Request validation
            // number
            if (is_numeric($order_id) == false || $order_id == null) {
                $this->response->redirect('/order');
                $this->flashSession->error(
                    parent::getFormattedFlashOutputStatic('Terjadi Kesalahan', ['Permintaan anda tidak dapat diproses'])
                );

                return;
            }
             
            // Right user
            $orderKu = Orders::findFirst(
                [
                    'conditions' => 'order_id = :order_id:',
                    'bind' => [ 'order_id' => $order_id ],
                ]
            )->toArray();

            if ($orderKu['user_id'] != $this->session->auth['id']) {
                $this->response->redirect('/order');
                $this->flashSession->error(
                    parent::getFormattedFlashOutputStatic('Terjadi Kesalahan', ['Permintaan anda tidak dapat diproses'])
                );

                return;
            }
            
            // Request OK, continue to create
            $delivery = new PickupDelivery();
            
            $delivery->user_id      = $this->session->auth['id'];
            $delivery->order_id     = $order_id;
            $delivery->pd_status    = 'Permintaan sedang diproses';
            $delivery->pd_type      = 1; // 1 for delivery

            $delivery->save();
            $this->response->redirect('/order/detail/' . $order_id);
            $this->flashSession->success(
                parent::getFormattedFlashOutputStatic('Berhasil', ['Permintaan anda sedang diproses'])
            );
        }
        else {
            $this->response->redirect('/order');
        }
    }
}