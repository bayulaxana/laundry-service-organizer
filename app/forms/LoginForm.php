<?php
declare(strict_types=1);

namespace LaundryApp\Forms;

use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

class LoginForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        // Username
        $username = new Text('username');

        $username->setLabel('Username');
        $username->setFilters(['string', 'striptags']);
        $username->addValidators([
            new PresenceOf(['message' => 'Anda harus mengisikan username'])
        ]);

        // Password
        $password = new Password('password');
        
        $password->setLabel('Password');
        $password->addValidators([
            new PresenceOf(['message' => 'Anda harus mengisikan password'])
        ]);

        $this->add($username);
        $this->add($password);
    }
}