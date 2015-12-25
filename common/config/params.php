<?php
return [
    // STUB поменять перед релизом адрес почтового робота.
    'robotEmail' => 'robot@myhost.ru',
    'user.passwordResetTokenExpire' => 3600,
    // STUB 
    // Позже нужно будет поменять на "upload", 
    // чтобы в корне не было множества папок с пользовательскими файлами.
    'lib' => '/media_library/',
    'site_title' => 'My Cool Site',
    'site_title_for_tab' => 'My Cool Site',
    'aliases' => [
            '@main_root' => realpath(dirname(__FILE__) . '/../../'),
        ],
];
