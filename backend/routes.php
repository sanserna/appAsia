<?php

// Routes

// $app->get('/', function ($request, $response, $args) {

//     $this->logger->info('agloooo');

//     return '<h1>HOLA</h1>';

// });

$app->group('/countries', function () {

    $this->get('', 'CountryController:getAll');
    $this->get('/{id}', 'CountryController:get');
    $this->post('', 'CountryController:algo');

});

$app->group('/cities', function () {

    $this->get('', 'CityController:getAll');
    $this->get('/{id}', 'CityController:get');

});
