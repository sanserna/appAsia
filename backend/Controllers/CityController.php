<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\City;
use App\Exceptions\CityException;

class CityController {

    private $logger;
    private $table;

    public function __construct($table, $logger) {

        $this->table = $table;
        $this->logger = $logger;

    }

    public function getAll (Request $request, Response $response, $args) : Response {

        $this->logger->info('Inicio obtener lista de ciudades');

        $cities = $this->table
            ->orderBy('position', 'ASC')
            ->get();

        if ($cities->isEmpty()) {

            $this->logger->error('No existe ninguna ciudad');
            throw new CityException('No existe ninguna ciudad', 1);

        }

        $this->logger->info('Fin obtener lista de ciudades');

        return $response
            ->withHeader('Content-type', 'application/json')
            ->withJson($countries, 200);

    }

    public function get (Request $request, Response $response, $args) : Response {

        $cityId = $args['id'];

        $this->logger->info("Inicio obtener ciudad con id: ${cityId}");

        $city = City::find($cityId);

        if (!isset($city)) {

            $this->logger->error("No existe ninguna ciudad con el id: ${cityId}");
            throw new CityException("No existe ninguna ciudad con el id: ${cityId}", 1);

        }

        $this->logger->info("Fin obtener ciudad con id: ${cityId}");

        return $response
            ->withHeader('Content-type', 'application/json')
            ->withJson($city, 200);

    }

}
