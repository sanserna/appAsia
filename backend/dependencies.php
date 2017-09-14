<?php

use Slim\Views\PhpRenderer;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Monolog\Handler\StreamHandler;
use Illuminate\Database\Capsule\Manager;

// DIC configuration
$container = $app->getContainer();

// VIEW CONFIGURATION ----------------------------------------------------------

// view renderer
$container['renderer'] = function ($c) {

    $settings = $c->get('settings')['renderer'];

    return new PhpRenderer($settings['template_path']);

};

// LOGGER CONFIGURATION --------------------------------------------------------

// monolog
$container['logger'] = function ($c) {

    $settings = $c->get('settings')['logger'];
    $logger = new Logger($settings['name']);
    $logger->pushProcessor(new UidProcessor());
    $logger->pushHandler(new StreamHandler($settings['path'], $settings['level']));

    return $logger;

};

// DATABASE CONFIGURATION ------------------------------------------------------

// service factory for the ORM
$container['db'] = function ($c) {

    $settings = $c->get('settings')['db'];

    $capsule = new Manager;
    $capsule->addConnection($settings);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;

};

// ERROR HANDLERS --------------------------------------------------------------

// php error handler
$container['phpErrorHandler'] = function ($c) {

    return function ($request, $response, $error) use ($c) {

        $logger = $c->get('logger');

        $logger->error($error);

        return $c['response']
            ->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write($error);

    };

};

// error handler
$container['errorHandler'] = function ($c) {

    return function ($request, $response, $exception) use ($c) {

        $logger = $c->get('logger');

        $logger->error($exception);

        return $c['response']
            ->withStatus(417)
            ->withHeader('Content-Type', 'application/json')
            ->write($exception->getMessage());

    };

};

// CONTROLLERS -----------------------------------------------------------------

// city controller
$container['CityController'] = function ($c) {

    $logger = $c->get('logger');
    $table = $c->get('db')->table('cities');

    return new \App\Controllers\CityController($table, $logger);

};

// country controller
$container['CountryController'] = function ($c) {

    $logger = $c->get('logger');
    $table = $c->get('db')->table('countries');

    return new \App\Controllers\CountryController($table, $logger);

};
