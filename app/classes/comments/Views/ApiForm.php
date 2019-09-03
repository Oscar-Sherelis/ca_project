<?php

namespace App\comments\Views;

class ApiForm extends \Core\Views\Form { 
// form renders $form array. 

    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'comment' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ]
        ];
    }

}
