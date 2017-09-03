<?php

// Routes

$app->get('/', function ($request, $response, $args) {

    $this->logger->info('agloooo');

    return '<h1>HOLA</h1>';

});

$app->post('/san', function ($request, $response, $args) {



});
