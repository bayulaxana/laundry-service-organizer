<?php
declare(strict_types=1);

use LaundryApp\Forms\CommentForm;
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
                WHERE ord.user_id = " . $this->session->auth['id'] . " ORDER BY ord.order_date DESC";
    
        
        $data = $this->dbConnection->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);
        
        $paginator = new ArrayPaginator(
            [
                'data' => $data,
                'limit' => 8,
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
            $this->flashSession->success(
                ControllerBase::getFormattedFlashOutputStatic('Berhasil', ['Pesanan anda berhasil disimpan'])
            );
            return;
        }
        
        $this->view->form = $form;
    }

    public function detailAction($orderId = null)
    {
        if (is_numeric($orderId) == false || $orderId == null) {
            $this->response->redirect('/order');
            $this->flashSession->error(
                parent::getFormattedFlashOutputStatic('Terjadi Kesalahan', ['Tidak dapat mengakses detail pesanan'])
            );
        }
        else {
            $commentForm = new CommentForm();

            // Fetch user information
            $user = Users::find(
                [
                    'conditions' => 'user_id = :user_id:',
                    'bind' => [
                        'user_id' => $this->session->auth['id'],
                    ]        
                ]
            )->toArray();
            
            // Fetch the order detail
            $sql = "SELECT ord.*, srv.service_code, srv.service_name, srv.service_price, srv.service_unit_scheme
                    FROM Orders AS ord
                    INNER JOIN Service AS srv
                    ON ord.service_id = srv.service_id
                    WHERE ord.user_id = " . $this->session->auth['id'] . " AND ord.order_id = " . $orderId;
            $order = $this->dbConnection->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

            // Fetch the delivery status
            $sql = "SELECT * FROM Pickup_Delivery WHERE order_id = " . $orderId;
            $pickupDelivery = $this->dbConnection->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

            if (!$order) {
                $this->response->redirect('/order');
                $this->flashSession->error(
                    parent::getFormattedFlashOutputStatic('Terjadi Kesalahan', ['Tidak dapat mengakses detail pesanan'])
                );
            }

            if (!$pickupDelivery) {
                $this->view->setVar('pickupDelivery', null);
            }
            else {
                $this->view->setVar('pickupDelivery', $pickupDelivery[0]);
            }
            
            // Fetch all comments
            $comments = Comment::find(
                [
                    'conditions' => 'order_id = :order_id:',
                    'bind' => ['order_id' => $orderId],
                ]
            )->toArray();
            
            if (!$comments) {
                $this->flash->error(
                    parent::getFormattedFlashOutputStatic('Terjadi Kesalahan', ['Tidak dapat mengakses komentar'])
                );
            }

            // Sends everything to view
            $this->assets->addJs('js/order/detail.js');
            $this->view->setVar('user', $user[0]);
            $this->view->setVar('order', $order[0]);
            $this->view->setVar('comments', $comments);
            $this->view->commentForm = $commentForm;
        }        
    }
}

