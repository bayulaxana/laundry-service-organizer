<?php
declare(strict_types=1);

use LaundryApp\Forms\ItemForm;
use Phalcon\Db\Enum;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Paginator\Adapter\NativeArray as ArrayPaginator;

class MyItemController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $titleArray = [
            'index' => 'Daftar Item',
            'new' => 'Tambah Item',
            'edit' => 'Edit Item',
            'update' => 'Update Item',
            'delete' => 'Hapus Item',
        ];
        $actionName = $this->dispatcher->getActionName();
        $controllerName = $this->dispatcher->getControllerName();
        
        $this->tag->setTitle($titleArray[$actionName]);
        $this->view->setTemplateAfter('main-layout');
    }
    
    public function indexAction()
    {
        $form = new ItemForm(null, ['edit' => true]);

        // Start pagination
        $currentPage = $this->request->getQuery('page', 'int', 1);
        $myItem = Item::find(
            [
                'conditions' => 'user_id = :user_id:',
                'bind' => [
                    'user_id' => $this->session->auth['id'],
                ]
            ]
        )->toArray();

        $paginator = new ArrayPaginator(
            [
                'data' => $myItem,
                'limit' => 5,
                'page' => $currentPage,
            ]
        );
        $page = $paginator->paginate();
        
        // Send everything to the view
        $this->assets->addJs('js/myitem/item.js');
        $this->view->setVar('page', $page);
        $this->view->form = $form;
    }

    public function newAction()
    {
        $form = new ItemForm();

        if ($this->request->isPost()) {
            
            if ($form->isValid($this->request->getPost()) == false) {
                $this->response->redirect('/myitem');
                
                $messages = $form->getMessages();
                $msgList = [];
                
                foreach ($messages as $msg) {
                    array_push($msgList, $msg->getMessage());
                    $field = $form->get($msg->getField());
                    $field->setAttribute('class', 'input-error');
                    
                }

                $this->flashSession->error(
                    ControllerBase::getFormattedFlashOutputStatic('Terjadi Kesalahan', $msgList),
                );

                return;
            }

            $data = $this->request->getPost();
            $item = new Item();

            $item->user_id      = $this->session->auth['id'];
            $item->item_details = $data['item_details'];
            $item->item_type    = $data['item_type'];
            $item->item_image   = 'img/' . 'default.png';

            $item->save();

            if ($this->request->hasFiles() == true) {

                foreach($this->request->getUploadedFiles() as $file) {
                    $fileNametoDB = 
                        "img/item/item-id-" . 
                        $item->item_id . "-" .
                        date_create('now')->format('Y-m-d His') . "." . $file->getExtension();
                    $savePath = BASE_PATH . '/public/' . $fileNametoDB;
                    $file->moveTo($savePath);
                    
                    $item->user_id      = $this->session->auth['id'];
                    $item->item_details = $data['item_details'];
                    $item->item_type    = $data['item_type'];
                    $item->item_image   = $fileNametoDB;

                    $item->update();
                }
            }

            $this->response->redirect('/myitem');
            $this->flashSession->success(
                ControllerBase::getFormattedFlashOutputStatic('Berhasil', ['Item berhasil disimpan']),
            );
            
            return;
        }
        $this->view->form = $form;
    }

    public function updateAction()
    {
        $form = new ItemForm(null, ['edit' => true]);
        // Update
        if ($this->request->isPost()) {
            
            if ($form->isValid($this->request->getPost()) == false) {
                $this->response->redirect('/myitem');
                
                $messages = $form->getMessages();
                $msgList = [];
                
                foreach ($messages as $msg) {
                    array_push($msgList, $msg->getMessage());
                    $field = $form->get($msg->getField());
                    $field->setAttribute('class', 'input-error');
                    
                }

                $this->flashSession->error(
                    ControllerBase::getFormattedFlashOutputStatic('Terjadi Kesalahan', $msgList),
                );

                return;
            }
            $data = $this->request->getPost();
            $item = new Item();
            
            $item->item_id      = $data['item_id'];
            $item->user_id      = $this->session->auth['id'];
            $item->item_details = $data['item_details'];
            $item->item_type    = $data['item_type'];

            $item->update();
            $form->clear();
            $this->response->redirect('/myitem');
            $this->flashSession->success(
                ControllerBase::getFormattedFlashOutputStatic('Berhasil', ['Item berhasil diperbarui'])
            );
        }
        $this->response->redirect('/myitem');
    }

    public function deleteAction()
    {
        $this->view->disable();
        
        if ($this->request->getPost()) {
            $item = Item::findFirst(
                [
                    'conditions' => 'item_id = :item_id:',
                    'bind' => [
                        'item_id' => $this->request->getPost('item_id'),
                    ]
                ]
            );

            if ($item) {
                $item->delete();   
                $this->flashSession->success(
                    ControllerBase::getFormattedFlashOutputStatic('Berhasil', ['Item berhasil dihapus'])
                );             
            }
            else {
                $this->flashSession->error(
                    ControllerBase::getFormattedFlashOutputStatic('Gagal', ['Item tidak ditemukan'])
                );
            }
        }
        $this->response->redirect('/myitem');
    }
}