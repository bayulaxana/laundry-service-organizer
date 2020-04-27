<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class ApiController extends Controller
{
    public function initialize()
    {
        $this->view->disable();
    }
    
    public function indexAction()
    {

    }

    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        if ($this->request->isAjax() == false) {
            $this->response->redirect('/dashboard');
            return false;
        }
        else {
            return true;
        }
    }

    public function getitemAction($item_id)
    {
        $this->view->disable();

        $data = Item::findFirst(
            [
                'conditions' => 'item_id = :item_id: AND user_id = :user_id:',
                'bind' => [
                    'item_id' => $item_id,
                    'user_id' => $this->session->auth['id'],
                ]
            ]
        );
        $dataArr = [
            'item_id' => $data->item_id,
            'item_details' => $data->item_details,
            'item_type' => $data->item_type,
        ];

        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setJsonContent($dataArr);
        $this->response->send();
    }

    public function getserviceAction($service_id)
    {
        $this->view->disable();

        $service = Service::findFirst(
            [
                'conditions' => 'service_id = :service_id:',
                'bind' => ['service_id' => $service_id],
            ]
        )->toArray();

        $service['service_price'] = number_format($service['service_price'], 0, ',', '.');

        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setJsonContent($service);
        $this->response->send();
    }

    public function getitemlistAction($order_id)
    {
        $this->view->disable();

        $sql = "SELECT itm.item_details
                FROM OrderItem AS orditem, Item AS itm
                WHERE orditem.order_id = :order_id: AND orditem.item_id = itm.item_id";
        
        $query = $this->modelsManager->createQuery($sql);
        $result = $query->execute(
            [
                'order_id' => $order_id,
            ]
        );

        $arr = $result->toArray();

        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setJsonContent($arr);
        $this->response->send();
    }
}