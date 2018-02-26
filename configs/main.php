<?php

$basePath = dirname(__DIR__);

return [
    'baseUrl' => '/contacts',
    'controllersPath' => "{$basePath}/controllers",
    'viewsPath' => "{$basePath}/views",
    'storagePath' => "{$basePath}/storage",
    'guestPages' => [
        'guest/login',
        'guest/auth',
        'guest/registration',
        'guest/createAccount'
    ],
    'databasePath' => "{$basePath}/database",
    'modelsPath' => "{$basePath}/models",
    'db' => [
        'host' => 'localhost',
        'user' => 'DeeDee',
        'password' => '0123456aA',
        'db' => '0812_samples'
    ]
];
