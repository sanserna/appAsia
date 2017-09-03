<?php

require_once __DIR__ . '/../src/config/app.php';

session_start();

// Instantiate the app
$settings = require ROOT . 'src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require ROOT . 'src/dependencies.php';

// Register middleware
require ROOT . 'src/middleware.php';

// Register routes
require ROOT . 'src/routes.php';

// Run app
$app->run();
