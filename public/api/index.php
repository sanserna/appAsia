<?php

require_once __DIR__ . '/../../backend/app.php';

session_start();

// Instantiate the app
$settings = require ROOT . 'backend/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require ROOT . 'backend/dependencies.php';

// Register middleware
require ROOT . 'backend/middleware.php';

// Register routes
require ROOT . 'backend/routes.php';

// Run app
$app->run();
