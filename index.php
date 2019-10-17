<?php

/**
 * Arquivo responsável por inicializar todo o sistema
 */

require_once __DIR__ . '/vendor/autoload.php';

// var_dump($_REQUEST);

use Viking\Controllers\TesteController;

$testeController = new TesteController();
$testeController->testar();