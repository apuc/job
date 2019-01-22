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
        'user' => [
            // following line will restrict access to profile, recovery, registration and settings controllers from backend
            'as backend' => 'dektrium\user\filters\BackendFilter',
        ],
        'company' => [
            'class' => 'backend\modules\company\Company',
        ],
        'employer' => [
            'class' => 'backend\modules\employer\Employer',
        ],
        'resume' => [
            'class' => 'backend\modules\resume\Resume',
        ],
        'vacancy' => [
            'class' => 'backend\modules\vacancy\Vacancy',
        ],
        'experience' => [
            'class' => 'backend\modules\experience\Experience',
        ],
        'education' => [
            'class' => 'backend\modules\education\Education',
        ],
        'schedule' => [
            'class' => 'backend\modules\schedule\Schedule',
        ],
        'skill' => [
            'class' => 'backend\modules\skill\Skill',
        ],
    ],
    'components' => [
//        'request' => [
//            'csrfParam' => '_csrf-backend',
//        ],
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
//        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'request' => [
            'baseUrl' => '/secure',
            //'class' => 'frontend\components\LangRequest',
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => '',
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
