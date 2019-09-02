<?php

namespace App\Users\Views;

class RegisterForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'attr' => [
                'id' => 'register-form',
                'method' => 'POST',
            ],
            'fields' => [
                'name' => [
                    'label' => 'Name',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                        ]
                    ],
                ],
                'surname' => [
                    'label' => 'Surname',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                        ]
                    ],
                ],
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_mail',

                            'validate_text_lenght' => [
                                'validate_text_lenght' => 50
                            ]
                        ]
                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ],
                ],
                'password_repeat' => [
                    'label' => 'Password repeat',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Registruotis',
                ],
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat'
                ]
            ],
            'callbacks' => [
                'success' => 'form_success',
            ],
        ];
    }

}
