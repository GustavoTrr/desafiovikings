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