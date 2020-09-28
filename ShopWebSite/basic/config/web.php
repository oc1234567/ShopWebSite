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
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'qlfjzmEy3h8LoSq0_3pbL3Zwf0P3JaVm',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
        // 'urlManager' => [
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        //     'rules' => [
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\goods'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\products'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\shop-index'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\index-pos'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\size-product'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\product-color'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\product-size'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\count-product'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\customer'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\customer-addr'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\order'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\order-detail'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\cart-product'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\product-category'],
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'api\market'],
        //     ],
        // ],
        
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
