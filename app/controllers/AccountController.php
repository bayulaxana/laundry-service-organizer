<?php
declare(strict_types=1);

use LaundryApp\Forms\AccountForm;
use Phalcon\Db\Enum;
use Phalcon\Mvc\Dispatcher;

class AccountController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $titleArray = [
            'index' => 'Profil',
            'edit' => 'Edit Profil',
        ];
        $actionName = $this->dispatcher->getActionName();
        $controllerName = $this->dispatcher->getControllerName();
        
        $this->tag->setTitle($titleArray[$actionName]);
        $this->view->setTemplateAfter('main-layout');
    }

    protected function getUserProfileInfo($user): array
    {
        $arr = [
            'name' => [
                'val'  => $user['name'], 'label' => 'Nama',
                'icon' => 'user',
            ],
            'username' => [
                'val'  => $user['username'], 'label' => 'Username',
                'icon' => 'user',
            ],
            'email' => [
                'val'  => $user['email'], 'label' => 'Email',
                'icon' => 'user',
            ],
            'phone' => [
                'val'  => $user['phone'], 'label' => 'Nomor Telepon',
                'icon' => 'user',
            ],
            'address' => [
                'val'  => $user['address'], 'label' => 'Alamat',
                'icon' => 'user',
            ],
        ];

        return $arr;
    }
    
    public function indexAction()
    {
        $user = Users::findFirst(
            [
                'conditions' => 'user_id = :user_id:',
                'bind' => [ 'user_id' => $this->session->auth['id'] ]
            ]
        );
        $form = new AccountForm($user, ['edit' => true]);
        $user = $user->toArray();

        $item = Item::find(
            [
                'conditions' => 'user_id = :user_id:',
                'bind' => [ 'user_id' => $this->session->auth['id'] ],
                'limit' => 8,
            ]
        )->toArray();
        
        $inlineCss =    "#item-segment,
                        #profile-segment {
                            margin-bottom: 1rem;
                        }

                        .list-header {
                            font-size: 1.2rem;
                        }

                        .ui.vertical-segment {
                            margin: 1rem;
                        }";

        $this->view->form = $form;
        $this->assets->addInlineCss($inlineCss);
        $this->assets->addJs('js/account/profile.js');
        $this->view->setVar('user', $user);
        $this->view->setVar('userInfo', $this->getUserProfileInfo($user));
        $this->view->setVar('items', $item);
    }

    public function editAction()
    {        
        $this->view->disable();
        
        if ($this->request->isPost() == false) {
            $this->response->redirect('/account');
            return;
        }

        $user = Users::findFirst(
            [
                'conditions' => 'user_id = :user_id:',
                'bind' => [ 'user_id' => $this->session->auth['id'] ]
            ]
        );
        
        if (!$user) {
            $this->response->redirect('/logout');
            return;
        }
        
        $form = new AccountForm($user, ['edit' => true]);
        
        if ($this->request->isPost() == true) {
            // Basic Info
            $emptyForm = new AccountForm();
            if ($emptyForm->isValid($this->request->getPost()) == false) {
                $this->response->redirect('/account');
                
                $messages = $form->getMessages();
                $msgList = [];
                
                foreach ($messages as $msg) {
                    array_push($msgList, $msg->getMessage());
                }

                $this->flashSession->error(
                    ControllerBase::getFormattedFlashOutputStatic('Gagal', $msgList),
                );

                return;
            }

            $formData = $this->request->getPost();
            $userData = $user->toArray();

            $user = new Users();

            $user->user_id  = $userData['user_id'];
            $user->username = $userData['username'];
            $user->password = $userData['password'];
            $user->name     = $formData['name'];
            $user->email    = $formData['email'];
            $user->phone    = $formData['phone'];
            $user->address  = $formData['address'];
            $user->gender   = $userData['gender'];
            $user->role     = $userData['role'];
            $user->register_date = $userData['register_date'];
            $user->profile_img = $userData['profile_img'];

            // Photo
            if ($this->request->hasFiles() == true) {

                foreach($this->request->getUploadedFiles() as $file) {
                    $fileNametoDB = 
                        "img/profile_image/user-id-" . 
                        $user->user_id . "-" .
                        date_create('now')->format('Y-m-d His') . "." . $file->getExtension();

                    $savePath = BASE_PATH . '/public/' . $fileNametoDB;
                    $file->moveTo($savePath);

                    if ($user->profile_img != 'img/default.png') {
                        $unlinkStatus = unlink(BASE_PATH . '/public/' . $user->profile_img);
                    }
                    else { $unlinkStatus = true; }

                    if ($unlinkStatus == false) {
                        $this->response->redirect('/account');
                        $this->flashSession->error(
                            parent::getFormattedFlashOutputStatic('Terjadi Kesalahan', ['Terjadi kesalahan saat memperbarui'])
                        );
                    }
                    else {
                        $user->profile_img = $fileNametoDB;
                    }
                }
            }

            // Password
            $newPassword = $this->request->getPost('password');
            
            if ($newPassword) {
                $user->password = $this->security->hash($newPassword);
            }

            $user->update();
            $this->response->redirect('/account');
            $this->flashSession->success(
                parent::getFormattedFlashOutputStatic('Berhasil', ['Akun anda berhasil diperbarui'])
            );
        }
        
        $this->view->form = $form;
    }
}