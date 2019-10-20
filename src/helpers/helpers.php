<?php

/**
 * Este arquivo deve conter funções genéricas (HELPERS) 
 * que estarão disponíveis para toda a aplicação
 */

use Viking\Auth\Auth;
use Viking\Config\Config;
use Viking\Routes\Routes;
use Viking\Views\View;

/**
 * Função Dump And Die
 *
 * @param mixed $variavel
 * @return void
 */
function dd($variavel)
{
   var_dump($variavel);
   die();
}

/**
 * Função responsável por encerrar a execução da aplicação retornando um status code HTTP específico
 *
 * @param integer $httpStatusCode
 * @param string $strMensagem
 * @return void
 */
function abort(int $httpStatusCode, $strMensagem)
{
   // header('HTTP/1.0 404 Not Found');
   http_response_code($httpStatusCode);
   die($strMensagem);
}

/**
 * Função responsável por retornar o usuário logado
 *
 * @return Usuario 
 */
function authuser()
{
   return Auth::user();
}

/**
 * Funçõ para facilitar a construção de páginas por pedaços
 *
 * @param [type] $endereco
 * @return void
 */
function getPageContent($endereco)
{
   return file_get_contents(Config::getBasePath() . '/src/views/paginas/' . $endereco . '.php');
}

function includeViewPiece($endereco, $arrVars = [])
{
   return View::incluir($endereco, $arrVars);
}

function appbasepath()
{
   return Config::getBasePath();
}

function appbaseurl()
{
   return Routes::getBaseURL();
}

function getconfig($param)
{
   return Config::getEnv($param) ?? '';
}