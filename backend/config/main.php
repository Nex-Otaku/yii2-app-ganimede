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
    'bootstrap' => [
        'log',
        'rbac-admin',
    ],
    'modules' => [
        // ID модуля должен обязательно быть "user", иначе модуль не загрузится.
        'user' => [
            'class' => 'nex_otaku\user\UserBackendModule',
        ],
        // ID модуля может быть любой.
        'rbac-admin' => [
            'class' => 'nex_otaku\admin\Module',
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl' => '/admin',
            'csrfParam' => '_backendCSRF',
            'csrfCookie' => [
                'httpOnly' => true,
                'path' => '/admin',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_backendIdentity',
                'path' => '/admin',
                'httpOnly' => true,
            ],
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
        'session' => [
            'name' => 'BACKENDSESSID',
            'cookieParams' => [
                'path' => '/admin',
                'httpOnly' => true,
            ],
        ],
        'urlManager' => [
            'rules' => [
                // Страница входа.
                '/sign-in' => 'user/security/login',
            ],
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\classes\AccessControl',
        // Маршруты, открытые по умолчанию всегда.
        // Открываем только для начальной разработки.
        // Как только основные данные о ролях заполнены,
        // убираем отсюда всё лишнее.
        'allowActions' => [
            // Маршрут для отображения странички логина.
            'site/*',
            // Вход и выход из профиля.
            'user/security/login',
            'user/security/logout',
            'user/security/auth',
            // Регистрация.
            'user/registration/register',
            'user/registration/resend',
            'user/registration/confirm',
            // Восстановление пароля.
            'user/recovery/request',
            'user/recovery/reset',
        ],
    ],
    'params' => $params,
];
