<?php

/**
 * Este arquivo deve conter funções genéricas (HELPERS) 
 * que estarão disponíveis para toda a aplicação
 */

 /**
  * Função Dump And Die
  *
  * @param mixed $variavel
  * @return void
  */
 function dd($variavel){
    var_dump($variavel); die();
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