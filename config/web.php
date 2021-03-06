<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'layout' => 'main_noFot',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hX196RxdmdWWqkoT2smiRjXIRXfRrdtA',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'amnah\yii2\user\components\User',
        ],
        'view' =>[
            'theme' => [
                'pathMap' => [
                    // path to custom view files:
                    '@vendor/amnah/yii2-user/views' => '@app/views/user',
                    // path to custom DefaultController.php:
                    '@vendor/amnah/yii2-user/controllers/DefaultController.php' => '@app/views/user/controllers/DefaultController.php',
                    // path to custom layouts:
                    '@vendor/amnah/yii2-user/layouts' => '@app/views/user/layouts',
                    // path to custom forms;
                    '@vendor/amnah/yii2-user/models/forms' => '@app/views/user/models/forms',
                    '@vendor/amnah/yii2-user/views/admin/' => '@app/views/user/admin'
                ]
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
//            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            //'useFileTransport' => true,
            'useFileTransport' => false,
            'messageConfig' => [
                'from' => ['codesamples.noreply@gmail.com' => 'Admin'], // this is needed for sending emails
                'charset' => 'UTF-8',
            ],
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'codesamples.noreply',
//                'from' => ['codesamples.noreply@gmail.com' => 'Admin'],
                'password' => 'Wdhbd6538-@1234',
                'port' => '587',
                'encryption' => 'tls',
            ]

        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true
        ]

    ],
    'modules' => [
        'user' => [
            'class' => 'amnah\yii2\user\Module',

            // setting up custom properties:
            'requireEmail' => true, // mailer confirmation enabled
            'requireUsername' => true
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ]

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
