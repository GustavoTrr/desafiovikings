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


    //**************************************************/


    /**
     * Direcionamento da Requisição
     * Esta função é responsável por interpretar a rota definida na URI 
     * e chamar o controller e o método correspondente como definido na constante ROTAS
     *
     * @param string $rota
     * @param array $arrQueryItens
     * @return void
     */
    public function direcionarRequisicao($rota, $arrQueryItens)
    {
        $rotaDefinida = self::ROTAS[$rota] ?? null;
        if (!empty($rotaDefinida)) {
            $arrayRotaAcao = explode('@',$rotaDefinida);

            $controller = $arrayRotaAcao[0];
            $acao = $arrayRotaAcao[1];
            $classe =  '\\Viking\\Controllers\\' . $controller;
            $obj = new $classe;
            echo $obj->$acao();
        } else {
            abort(404, 'Página não encontrada!');
        }
    }

}