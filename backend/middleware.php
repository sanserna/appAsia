<?php

// Application middleware

$app->add(function ($request, $response, $next) {

    $response = $next($request, $response);

    return $response
        ->withHeader('Access-Control-Allow-Origin', 'http://api.dev')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

});
