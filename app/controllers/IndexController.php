<?php
declare(strict_types=1);

use LaundryApp\Forms\LoginForm;

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $titleArray = [
            'index'     => 'Halaman Awal',
            'login'     => 'Masuk',
            'register'  => 'Daftar',
            'logout'    => 'Keluar',
        ];
        $actionName = $this->dispatcher->getActionName();
        $controllerName = $this->dispatcher->getControllerName();
        
        $this->tag->setTitle($titleArray[$actionName]);
        $this->view->setTemplateAfter('main-layout');
    }
    
    public function indexAction() {
        $this->loadLandingPageAssets();
    }

    public function loginAction()
    {
        $form = new LoginForm();
        
        if ($this->session->has('auth')) {
            $this->response->redirect('/dashboard');
        }
        
        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) == false) {
                $messages = $form->getMessages();
                $msgList = [];
                
                foreach ($messages as $msg) {
                    $msgList[$msg->getField()] = $msg->getMessage();
                }
                $this->view->setVar('messageList', $msgList);
            }

            $username = $this->request->get('username');
            $password = $this->request->get('password');

            $user = Users::findFirst([
                'username = :username: AND password = :password:',
                'bind' => [
                    'username' => $username,
                    'password' => $password,
                ]
            ]);

            if ($user) {
                $this->setUserSession($user);

                $this->dispatcher->forward([
                    'controller' => 'dashboard',
                    'action' => 'index',
                ]);

                return;
            }
        }

        $this->view->form = $form;
    }

    public function logoutAction() {
        $this->destroyUserSession();
    }

    private function loadLandingPageAssets()
    {
        // Load Javascript
        $this->assets->addJs('js/index/carousel.js');

        // Load CSS
        $this->assets->addCss('css/index/carousel.css');
    }

    private function setUserSession(Users $user)
    {
        $this->session->set('auth', [
            'id' => $user->user_id,
            'username' => $user->username,
        ]);
    }

    private function destroyUserSession()
    {
        $this->session->remove('auth');

        $this->dispatcher->forward([
            'controller' => 'index',
            'action' => 'index',
        ]);
    }
}