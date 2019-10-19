<?php

/**
 * Arquivo responsável por inicializar todo o sistema
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once '../src/helpers/helpers.php';

// var_dump($_REQUEST);
session_start();

use Viking\Routes\Routes;

//Separamos a queryString do restante da rota para enviar como parâmetros
$_REQUEST['rota'] = $_REQUEST['rota'] ?? '';
$queryItens = $_REQUEST;
unset($queryItens['rota']);

try {
    $routes = new Routes();
    $routes->direcionarRequisicao($_SERVER['REQUEST_METHOD'], $_REQUEST['rota'], $queryItens);
} catch (\Throwable $th) {
    dd($th);
}
