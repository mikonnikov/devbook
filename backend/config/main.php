<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'timeZone' => 'Europe/Moscow',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager'            => [        // Backend
            'enablePrettyUrl'   => false,   // true,
            'showScriptName'    => true,    // false,
            'rules'             => [],
        ],
        'urlManagerFrontend'    => [        // Frontend
            'class'             => 'yii\web\urlManager',
            'baseUrl'           => '',
            'hostInfo'          => '',
            'enableStrictParsing' => true,
            'enablePrettyUrl'   => true,
            'showScriptName'    => false,
            'rules' => [],
        ],
    ],
    'params' => $params,
];
