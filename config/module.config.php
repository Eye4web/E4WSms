<?php
return [
    'router' => [
        'routes' => [
            'e4wsms' => [
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route'    => '/e4wsms',
                    'defaults' => [
                        'controller' => 'E4W\Sms\Controller\Sms',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'E4W\Sms\Controller\Sms' => 'E4W\Sms\Factory\Controller\SmsControllerFactory',
        ],
    ],
];
