<?php

// Generates form, what adds users if you are logedin
namespace App\Comments\Views;

class BaseForm extends \Core\Views\Form {

    // takes Form class constructor
    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'comment' => [
                    'label' => 'Komentaras',
                    'type' => 'text',
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
