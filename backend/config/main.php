<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'backend\modules\api\Api',
        ],
        'file' => [
            'class' => 'backend\gelenDosya',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],

        ],
        'response' => [
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
            'loginUrl' => null,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                'api/auth' =>'api/site/login',
                ['class' => 'yii\rest\UrlRule', 'controller' => 'mom'],
                'GET api/mom/<id:\d+>' => 'api/mom/view',
                'PUT,PATCH api/mom/<id:\d+>' => 'api/mom/update',
                'DELETE api/mom/<id:\d+>' => 'api/mom/delete',
                'POST api/mom' => 'api/mom/create',
                'POST api/mom/<id:\d+>/upload-file' => 'api/mom/upload-file',

                'GET api/children/<id:\d+>' => 'api/children/view',
                'PUT,PATCH api/children/<id:\d+>' => 'api/children/update',
                'DELETE api/children/<id:\d+>' => 'api/children/delete',
                'POST api/children' => 'api/children/create',
            ],
        ],

    ],
    'params' => $params,
];
