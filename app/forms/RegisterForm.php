<?php
declare(strict_types=1);

namespace LaundryApp\Forms;

use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

class RegisterForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        // Basic Text input fields
        $textFields = [
            'name' => [
                'label' => 'Nama',
                'fieldName' => 'name',
                'message' => 'Anda harus mengisikan Nama'
            ],
            'username' => [
                'label' => 'Username',
                'fieldName' => 'username',
                'message' => 'Anda harus mengisikan Username'
            ],
        ];

        foreach ($textFields as $field => $value) {
            $input = new Text($value['fieldName']);
            
            $input->setLabel($value['label']);
            $input->setFilters(['striptags', 'string']);
            $input->setAttribute('id', 'register-' . $field);
            $input->addValidators([
                new PresenceOf(['message' => $value['message']])
            ]);

            $this->add($input);
        }

        // Address
        $address = new TextArea('address');

        $address->setLabel('Alamat');
        $address->setFilters(['striptags', 'string']);
        $address->setAttribute('id', 'register-' . $address->getName());
        $address->addValidators([
            new PresenceOf(['message' =>  'Anda harus mengisikan alamat'])
        ]);

        // Email
        $email = new Text('email');

        $email->setLabel('Email');
        $email->setFilters('email');
        $email->addValidators([
            new PresenceOf(['message' => 'Anda harus mengisikan alamat email']),
            new Email(['message' => 'Email yang anda masukkan tidak valid']),
        ]);

        // Phone
        $phone = new Text('phone');

        $phone->setLabel('Nomor Telepon');
        $phone->setFilters('number');
        $phone->addValidators([
            new PresenceOf(['message' => 'Anda harus mengiskan nomor telepon'])
        ]);

        // Select input fields
        $gender = new Select(
            'gender',
            [
                '' => 'Pilih jenis kelamin',
                1 => 'Laki laki',
                2 => 'Perempuan',
            ],  
        );

        $gender->setLabel('Jenis Kelamin');
        $gender->setDefault(0);
        $gender->setAttribute('id', 'register-' . $gender->getName());
        $gender->setAttribute('class', 'ui select dropdown');

        $passwod = new Password('password');
        
        $passwod->setLabel('Password');
        $passwod->addValidators([
            new PresenceOf(['message' => 'Anda harus mengisikan password'])
        ]);
        
        // Add everything to the Form
        $this->add($gender);
        $this->add($email);
        $this->add($phone);
        $this->add($passwod);
        $this->add($address);
    }
}