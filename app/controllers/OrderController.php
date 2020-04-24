<?php
declare(strict_types=1);

use LaundryApp\Forms\CreateOrderForm;
use Phalcon\Db\Column;
use Phalcon\Db\Enum;
use Phalcon\Security;
use Phalcon\Paginator\Adapter\Model as ModelPaginator;
use Phalcon\Paginator\Adapter\NativeArray as ArrayPaginator;

class OrderController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $titleArray = [
            'index'     => 'Riwayat Pesanan',
            'detail'    => 'Detail Pesanan',
            'new'       => 'Pesanan Baru',
        ];
        $actionName = $this->dispatcher->getActionName();
        $controllerName = $this->dispatcher->getControllerName();
        
        $this->tag->setTitle($titleArray[$actionName]);
        $this->view->setTemplateAfter('main-layout');
    }

    public function indexAction()
    {
        $currPage = $this->request->getQuery('page', 'int', 1);
        
        $sql = "SELECT ord.*, srv.service_code, srv.service_name
                FROM Orders AS ord
                INNER JOIN Service AS srv
                ON ord.service_id = srv.service_id
                WHERE ord.user_id = " . $this->session->auth['id'] . " ORDER BY ord.order_date";
        
        $data = $this->dbConnection->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);
        $paginator = new ArrayPaginator(
            [
                'data' => $data,
                'limit' => 5,
                'page' => $currPage,
            ]
        );
        $page = $paginator->paginate();

        $this->view->setVar('page', $page);
    }

    public function newAction()
    {
        $form = new CreateOrderForm();
        $this->assets->addCss('css/order/order-form.css');
        $this->assets->addJs('js/order/custom.js');

        if ($this->request->isPost()) {
            $data = $this->request->getPost();
            
            // Insert orders record to the database
            $order = new Orders();
            $order->service_id = (int) $data['service'];
            $order->user_id = (int) $this->session->auth['id'];
            $order->order_status = 'Menunggu Barang';
            $order->order_amount = 0;
            $order->order_date   = date_create('now')->format('Y-M-d');

            $order->save();
            
            // Add the order-item to database
            foreach ($data['item'] as $key => $item_id) {
                $sql = "INSERT INTO Order_Item (item_id, order_id) VALUES (:item_id, :order_id);";
                $this->dbConnection->query(
                    $sql,
                    [
                        'item_id' => (int) $item_id,
                        'order_id' => $order->order_id,
                    ]
                );
            }

            $this->response->redirect('/order');
            return;
        }
        
        $this->view->form = $form;
    }

    public function detailAction()
    {
        $this->view->disable();
        $x = strtotime('2020-04-24');
        echo var_dump($x);
    }
}

