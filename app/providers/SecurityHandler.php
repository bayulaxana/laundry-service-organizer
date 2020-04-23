<?php

namespace LaundryApp\Providers;

use Phalcon\Acl\Adapter\Memory;
use Phalcon\Acl\Component;
use Phalcon\Acl\Enum as AclEnum;
use Phalcon\Acl\Role;
use Phalcon\Di\Injectable;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;

class SecurityHandler extends Injectable
{
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $authorization = $this->session->get('auth');

        if (!$authorization) {
            $role = 'Guests';
        }
        else {
            $role = 'Users';
        }

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();
        $acl = $this->getAclList();

        $allowed = $acl->isAllowed($role, $controller, $action);
        if (!$allowed) {
            $this->response->redirect('/login');
            $this->session->destroy();
            
            return false;
        }

        return true;
    }

    protected function getAclList(): Memory
    {
        if (isset($this->persistent->acl)) {
            return $this->persistent->acl;
        }
        
        $acl = new Memory();
        $acl->setDefaultAction(AclEnum::DENY);

        // Register Roles
        $roles = [
            'users' => new Role('Users', 'Member'),
            'guests' => new Role('Guests', 'Tamu'),
        ];

        foreach ($roles as $role) {
            $acl->addRole($role);
        }

        $privateResources = [
            'index' => ['logout'],
            'dashboard' => ['index', 'activity', 'latest'],
            'order' => ['index', 'detail'],
        ];
        foreach ($privateResources as $resource => $actions) {
            $acl->addComponent(new Component($resource), $actions);
        }

        $publicResources = [
            'index' => ['index', 'login'],
            'service' => ['index', 'add'],
            'register' => ['index', 'save'],
        ];
        foreach ($publicResources as $resource => $actions) {
            $acl->addComponent(new Component($resource), $actions);
        }

        // Access for guest and user
        foreach ($roles as $role) {
            foreach ($publicResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow($role->getName(), $resource, $action);
                }
            }
        }

        // Access for user only
        foreach ($privateResources as $resource => $actions) {
            foreach ($actions as $action) {
                $acl->allow('Users', $resource, $action);
            }
        }

        $this->persistent->acl = $acl;

        return $acl;
    }
}