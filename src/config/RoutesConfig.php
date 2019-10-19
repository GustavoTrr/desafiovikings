<?php

namespace Viking\Config;

class RoutesConfig extends Config{

    /**
     * Classe crida para isolar a configuração das rotas dos mecanismos que as operam
     */


    /**
     * Aqui devem ser definidas as rotas da seguinte forma:
     * um array representado cada rota. Dentro de cada array, deve conter:
     * uma string que indique o método HTTP esperado para aquela rota
     * uma string indicando como  a URI deve ser montada para ser direcionada àquela rota
     * uma string contendo o nome da classe Controller concatenado de um "@" seguido do nome do método do controller que deverá ser chamado
     * um valor booleano [true/false] para informar se é necessário que o ususário esteja autenticado para aquela rota. Se não inserir este valor, é considerado "false"
     * Ex.: ['GET', 'testes/minha-primeira-rota' => 'TestesController@minhaPrimeiraRota']
     * 
     * É possível inserir um parâmetro variável na rota que deve ser definido dentro de chaves e deve ocupar a última posição da string, logo após a barra
     * O valor que for passado naquela posição dentro da URI será enviado como parâmetro do método
     * Ex.: ['GET','testes/minha-segunda-rota/{meuID}' => 'TestesController@testarComParametro']
     * Obs.: A assinatura do método no Controller deve contemplar uma variável para receber o parâmetro enviado
     */
    const ROTAS = [
        ['GET', '', 'VikingController@inicio', true],
        ['GET', 'login', 'LoginController@loginForm'],
        ['POST', 'login', 'LoginController@logar'],
        ['GET', 'login/recuperar-senha', 'LoginController@recuperarSenhaForm'],
        ['POST', 'login/recuperar-senha', 'LoginController@recuperarSenha'],
        ['GET', 'alterar-senha', 'LoginController@alterarSenhaForm', true],
        ['POST', 'alterar-senha', 'LoginController@alterarSenha', true],
        ['GET', 'logout', 'LoginController@logout'],
        ['GET', 'cartorios', 'CartorioController@index', true],
        ['GET', 'cartorios/criar', 'CartorioController@createForm', true],
        ['POST', 'cartorios/criar', 'CartorioController@create', true],
        ['GET', 'cartorios/editar/{idCartorio}', 'CartorioController@updateForm', true],
        ['POST', 'cartorios/editar/{idCartorio}', 'CartorioController@update', true],
        ['DELETE', 'cartorios/deletar/{idCartorio}', 'CartorioController@delete', true],
        ['GET', 'comunicado/enviar-email', 'ComunicadoController@comunicadoForm', true],
        ['POST', 'comunicado/enviar-email', 'ComunicadoController@enviarEmail', true],
    ];
}