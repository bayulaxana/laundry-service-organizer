<?php
declare(strict_types=1);

use LaundryApp\Forms\RegisterForm;

class RegisterController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $titleArray = [
            'index'     => 'Daftar',
            'save'      => 'Daftar',
        ];
        $actionName = $this->dispatcher->getActionName();
        $controllerName = $this->dispatcher->getControllerName();
        
        $this->tag->setTitle($titleArray[$actionName]);
        $this->view->setTemplateAfter('main-layout');
    }

    public function isUserExist($requestData)
    {
        $uniqueness = Users::findFirst([
            'username = :username: OR email = :email:',
            'bind' => [
                'username' => $requestData['username'],
                'email' => $requestData['email'],
            ]
        ]);

        if ($uniqueness) return true;
        else return false;
    }

    public function indexAction()
    {
        $form = new RegisterForm();
        
        if ($this->request->isPost()) {
            $user = new Users();
            $data = $this->request->getPost();
            $datetime = date_create('now')->format('Y-m-d H:i:s');

            if ($this->isUserExist($data)) {
                $this->flash->error('Akun anda telah terdaftar');
            }
            else {
                $user->username     = $data['username'];
                $user->name         = $data['name'];
                $user->password     = $data['password'];
                $user->email        = $data['email'];
                $user->phone        = $data['phone'];
                $user->gender       = (int) $data['gender'] == 1 ? 'L' : 'P';
                $user->address      = $data['address'];
                $user->register_date = $datetime;
                $user->role = 1;
    
                $user->save();
                $form->clear();
            }
        }
        
        $this->view->form = $form;
    }

    public function saveAction()
    {
        if ($this->request->isPost() == false) {
            $this->response->redirect('/register');
        }
    }

}

