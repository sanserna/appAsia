<?php

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // renderer settings
        'renderer' => [
            'template_path' => ROOT . 'app/templates/',
        ],

        // monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => ROOT . 'logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // database
        'db' => DATABASE
    ],
];
