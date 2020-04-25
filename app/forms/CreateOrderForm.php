<?php
declare(strict_types=1);

namespace LaundryApp\Forms;

use Item;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Service;

class CreateOrderForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        // Service select form
        $service = new Select(
            'service',
            Service::find(),
            [
                'emptyText' => 'Pilih layanan',
                'emptyValue' => '',
                'useEmpty' => true,
                'using' => [
                    'service_id',
                    'service_name',
                ],
                'id' => 'service-select',
                'class' => 'ui dropdown',
            ]
        );
        $service->setLabel('Pilih layanan');

        // Item
        $item = new Select(
            'item',
            Item::find(
                [
                    'user_id = :user_id:',
                    'bind' => [
                        'user_id' => $this->session->auth['id'],
                    ]
                ]
            ),
            [
                'emptyText' => 'Pilih item',
                'emptyValue' => '',
                'useEmpty' => true,
                'using' => [
                    'item_id',
                    'item_details',
                ],
                'id' => 'item-select-options',
                'multiple' => true,
                'class' => 'ui dropdown',
            ],
        );
        $item->setLabel('Pilih item');
        $item->setAttribute('name', 'item[]');

        $this->add($service);
        $this->add($item);
    }
}