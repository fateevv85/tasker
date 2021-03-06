<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    // for modules
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
        ],
    ],
//    'language' => 'ru-RU',
    'components' => [
        'authManager' => [
            'class' => \yii\rbac\DbManager::className()
        ],
        //i18n config
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => \yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@app/messages'
                ]
            ]
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ldHLqbE1wprSWM04DObuz7YQ-pdLchTl',
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //REDIS CACHE
        'cache_redis' => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => 0,
            ]
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
            /*
            //  real email send
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mail.ru',
                'username' => 'tasker_message@mail.ru',
                'password' => '*******',
                'port' => '465',
                'encryption' => 'ssl',
            ],*/
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
            // controller/action
            'enablePrettyUrl' => true,
            // address of php-script
            'showScriptName' => false,
            // forbidden to action-like names *task/index
//            'enableStrictParsing' => true,
            'rules' => [
                'calendar' => 'task/index',
                '/<lg:ru|en>' => 'task/local',
                'calendar/<date:\d{4}-\d{2}-\d{2}>' => 'task/events',
                'task/<id:\d+>' => 'task/view',
            ],
        ],
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
