<?php
return [
    // STUB поменять перед релизом адрес почтового робота.
    'robotEmail' => 'robot@myhost.ru',
    'user.passwordResetTokenExpire' => 3600,
    // STUB перенести этот параметр в настройки файл-менеджера по умолчанию.
    'lib' => '/upload/',
    'site_title' => 'My Cool Site',
    'site_title_for_tab' => 'My Cool Site',
    'aliases' => [
            '@main_root' => realpath(dirname(__FILE__) . '/../../'),
        ],
];
