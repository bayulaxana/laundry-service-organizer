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
            ],
            'username' => [
                'label' => 'Username',
                'fieldName' => 'username',
            ],
        ];

        foreach ($textFields as $field => $value) {
            $input = new Text($value['fieldName']);
            
            $input->setLabel($value['label']);
            $input->setFilters(['striptags', 'string']);
            $input->setAttribute('id', 'register-' . $field);
            $input->addValidators([
                new PresenceOf(['message' => $field . 'is required'])
            ]);

            $this->add($input);
        }

        // Address
        $address = new TextArea('address');

        $address->setLabel('Alamat');
        $address->setFilters(['striptags', 'string']);
        $address->setAttribute('id', 'register-' . $address->getName());
        $address->addValidators([
            new PresenceOf(['message' =>  'address is required'])
        ]);

        // Email
        $email = new Text('email');

        $email->setLabel('Email');
        $email->setFilters('email');
        $email->addValidators([
            new PresenceOf(['message' => 'email is required']),
            new Email(['message' => 'Email is not valid']),
        ]);

        // Phone
        $phone = new Text('phone');

        $phone->setLabel('Nomor Telepon');
        $phone->setFilters('number');
        $phone->addValidators([
            new PresenceOf(['message' => 'nomor telepon is required'])
        ]);

        // Select input fields
        $gender = new Select(
            'gender',
            [
                0 => 'Pilih jenis kelamin',
                1 => 'Laki laki',
                2 => 'Perempuan',
            ],  
        );

        $gender->setLabel('Jenis Kelamin');
        $gender->setDefault(0);
        $gender->setAttribute('id', 'register-' . $gender->getName());

        $passwod = new Password('password');
        
        $passwod->setLabel('Password');
        $passwod->addValidators([
            new PresenceOf(['message' => 'password is required'])
        ]);
        
        // Add everything to the Form
        $this->add($gender);
        $this->add($email);
        $this->add($phone);
        $this->add($passwod);
        $this->add($address);
    }
}