<?php

namespace App\Users\Views;

class LoginForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'attr' => [
                'id' => 'login-form',
                'method' => 'POST',
            ],
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter email',
                        ],
                        'validators' => [
                            'validate_not_empty',
                        ]
                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter password',
                        ],
                        'validators' => [
                            'validate_not_empty',
                            'validate_mail'
                        ]
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Login',
                ],
            ],
            'validators' => [
                'validate_login'
            ],            
            'callbacks' => [
                'success' => 'form_success',
            ],
        ];
    }

}
