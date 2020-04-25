<?php

use Phalcon\Mvc\Controller;

class ApiController extends Controller
{
    public function initialize()
    {
        $this->view->disable();
    }
    
    public function indexAction()
    {

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
}