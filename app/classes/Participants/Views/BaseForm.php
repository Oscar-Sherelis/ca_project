<?php

// Generates form, what adds users if you are logedin
namespace App\Participants\Views;

class BaseForm extends \Core\Views\Form {

    // takes Form class constructor
    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'name' => [
                    'label' => 'Vardas',
                    'type' => 'text',
                ],
                'surname' => [
                    'label' => 'Pavardė',
                    'type' => 'text',
                ],
                'city' => [
                    'label' => 'Miestas',
                    'type' => 'text',
                ],
                'email' => [
                    'label' => 'Emailas',
                    'type' => 'email',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Submit',
                ],
            ]
        ];
    }

}
