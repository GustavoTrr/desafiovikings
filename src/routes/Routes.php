<?php

namespace Viking\Routes;

/**
 * Classe responsavel pelo roteamento da aplicação
 * Definindo a URI e seu respectivo controller e action
 */
class Routes {
    
    /**
     * Aqui devem ser definidas as rotas da seguinte forma:
     * o índice de cada item deve ser a parte da rota sem o domínio e sem a query string
     * o valor de cada item deve ser o nome da classe Controller concatenado de um "@" seguido do nome do método do controller que deverá ser chamado
     * Ex.: ['testes/minha-primeira-rota' => 'TestesController@minhaPrimeiraRota']
     */
    const ROTAS = [
        'teste' => 'TesteController@testar',
    ];

    public function direcionarRequisicao($rota, $queryString)
    {
        //
    }

    public function testar()
    {
        $controller = 'TesteController';
        $acao = 'testar';
        $classe =  '\\Viking\\Controllers\\' . $controller;
        $obj = new $classe;
        echo $obj->$acao();
    }
}