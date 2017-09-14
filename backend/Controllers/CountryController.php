<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\Country;
use App\Exceptions\CountryException;

class CountryController {

    private $logger;
    private $table;

    public function __construct ($table, $logger) {

        $this->table = $table;
        $this->logger = $logger;

    }

    public function getAll (Request $request, Response $response, $args) : Response {

        $this->logger->info('Inicio obtener lista de paises');

        $countries = Country::with([
            'cities.vehicle',
            'cities.lodging',
            'cities.expense'
        ])
        ->orderBy('position', 'ASC')
        ->get();

        if ($countries == null or $countries->isEmpty()) {

            $this->logger->error('No existe ningun pais');
            throw new CountryException('No existe ningun pais', 1);

        }

        $this->logger->info('Fin obtener lista de paises');

        return $response
            ->withHeader('Content-type', 'application/json')
            ->withJson($countries, 200);

    }

    public function get (Request $request, Response $response, $args) : Response {

        $countryId = $args['id'];

        $this->logger->info("Inicio obtener pais con id: ${countryId}");

        $country = $this->table->find($countryId);

        if (!isset($country)) {

            $this->logger->error("No existe ningun pais con el id: ${countryId}");
            throw new CountryException("No existe ningun pais con el id: ${countryId}", 1);

        }

        $this->logger->info("Fin obtener pais con id: ${countryId}");

        return $response
            ->withHeader('Content-type', 'application/json')
            ->withJson($country, 200);

    }

}
