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
     * Ex.: ['GET', 'testes/minha-primeira-rota' => 'TestesController@minhaPrimeiraRota']
     * 
     * É possível inserir um parâmetro variável na rota que deve ser definido dentro de chaves e deve ocupar a última posição da string, logo após a barra
     * O valor que for passado naquela posição dentro da URI será enviado como parâmetro do método
     * Ex.: ['GET','testes/minha-segunda-rota/{meuID}' => 'TestesController@testarComParametro']
     * Obs.: A assinatura do método no Controller deve contemplar uma variável para receber o parâmetro enviado
     */
    const ROTAS = [
        ['GET', '', 'VikingController@inicio'],
        ['GET', 'login', 'LoginController@apresentarFormularioDeLogin'],
        ['POST', 'login', 'LoginController@logar'],
    ];
}