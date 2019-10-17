<?php

/**
 * Arquivo responsável por inicializar todo o sistema
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/helpers/helpers.php';

use Viking\Routes\Routes;

//Separamos a queryString do restante da rota para enviar como parâmetros
$queryItens = $_REQUEST;
unset($queryItens['rota']);

try {
    $routes = new Routes();
    $routes->direcionarRequisicao($_REQUEST['rota'], $queryItens);
} catch (\Throwable $th) {
    dd($th);
}