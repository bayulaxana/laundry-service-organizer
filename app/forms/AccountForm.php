<?php
declare(strict_types=1);

namespace LaundryApp\Forms;

use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

class AccountForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        if (isset($options['edit'])) {
            $userId = new Hidden('user_id');
            $this->add($userId);
        }
        
        // Basic Text input fields
        $textFields = [
            'name' => [
                'label' => 'Nama',
                'fieldName' => 'name',
                'message' => 'Nama harus diisi',
            ],
            'phone' => [
                'label' => 'Nomor Telepon',
                'fieldName' => 'phone',
                'message' => 'Nomor telepon harus diisi',
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
            new PresenceOf(['message' =>  'Alamat harus diisi'])
        ]);

        // Email
        $email = new Text('email');

        $email->setLabel('Email');
        $email->setFilters('email');
        $email->addValidators([
            new PresenceOf(['message' => 'Email harus diisi']),
            new Email(['message' => 'Email yang anda tuliskan tidak valid']),
        ]);

        $submit = new Submit('Simpan');

        $this->add($submit);
        $this->add($email);
        $this->add($address);
    }
}