<?php

namespace App\Participants\Views;

class ApiForm extends \Core\Views\Form { 
// form renders $form array. 

    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'name' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'surname' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'city' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'email' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                        ]
                    ]
                    // errors => []?
                ],
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ]
        ];
    }

}
