<?php

// Generates form, what adds comments only if logedin
namespace App\Comments\Views;

class BaseForm extends \Core\Views\Form {

    // takes Form from class constructor
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
