<?php
declare(strict_types=1);

use LaundryApp\Forms\CommentForm;

class CommentController extends ControllerBase
{
    public function initialize()
    {
        $this->view->disable();
    }

    public function newAction()
    {
        if ($this->request->isPost() == false) {
            $this->response->redirect('/order');
            return;
        }
        
        $form = new CommentForm();

        if ($this->request->isPost()) {
            $data = $this->request->getPost();

            if ($form->isValid($this->request->getPost()) == false) {
                $messages = $form->getMessages();
                $msgList = [];
                
                foreach ($messages as $msg) {
                    array_push($msgList, $msg->getMessage());
                    $field = $form->get($msg->getField());
                    $field->setAttribute('class', 'input-error');
                    
                }
                
                $this->flashSession->error(
                    $this->getFormattedFlashOutput('Terjadi Kesalahan', $msgList)
                );
                $this->response->redirect('/order/detail/' . $data['order_id']);
            }

            $comment = new Comment();

            $comment->user_id = (int) $this->session->auth['id'];
            $comment->comment_content = $data['comment_content'];
            $comment->comment_status  = 'Active';
            $comment->comment_date    = date_create('now')->format('Y-m-d H:i:s');
            $comment->order_id        = $data['order_id'];

            $comment->save();

            $this->flashSession->success(
                $this->getFormattedFlashOutput('Berhasil', ['Komentar berhasil disimpan'])
            );
            $this->response->redirect('/order/detail/' . $data['order_id']);
        }
    }

    public function deleteAction($commentId = null)
    {
        $this->view->disable();

        if ($this->request->isAjax() == false || !$commentId) {
            $this->response->redirect('/order');
            return;
        }

        if ($this->request->isAjax()) {
            $comment = Comment::findFirst(
                [
                    'conditions' => 'comment_id = :comment_id:',
                    'bind' => [
                        'comment_id' => $commentId,
                    ]
                ]
            );

            if ($comment && $comment->user_id == $this->session->auth['id']) {
                $comment->delete();

                $this->response->setContentType('application/json', 'UTF-8');
                $this->response->setJsonContent([
                    'success' => 'Komentar berhasil dihapus'
                ]);
                $this->response->send();
            }
        }
    }
}