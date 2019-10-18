<?php

namespace Viking\Routes;

/**
 * Classe responsavel pelo roteamento da aplicação
 * Definindo a URI e seu respectivo controller e action
 */
class Routes {
    
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


    //**************************************************/


    /**
     * Direcionamento da Requisição
     * Esta função é responsável por interpretar a rota definida na URI 
     * e chamar o controller e o método correspondente como definido na constante ROTAS
     *
     * @param string metodoHTTP
     * @param string $rotaSolicitada
     * @param array $arrQueryItens
     * @return void
     */
    public function direcionarRequisicao($metodoHTTP, $rotaSolicitada, $arrQueryItens)
    {
        $arrDadosRotaEncontrada = $this->encontrarRota($metodoHTTP, $rotaSolicitada);

        if ($arrDadosRotaEncontrada) {
            $controller = $arrDadosRotaEncontrada['controller'];
            $acao = $arrDadosRotaEncontrada['metodo'];
            $classe =  '\\Viking\\Controllers\\' . $controller;
            $obj = new $classe;
            if (!empty($arrDadosRotaEncontrada['parametro'])) {
                echo $obj->$acao($arrDadosRotaEncontrada['parametro']);
            } else {
                echo $obj->$acao();
            }
            
        } else {
            abort(404, 'Página não encontrada!');
        }
    }

    /**
     * retorna Controller, método e parametro com base na constante de rotas ou false/null em caso de não achar nada
     *
     * @param string $metodoHTTP GET/PUT/POST/DELETE
     * @param string $rota
     * @return array [controller, metodo, parametro]
     */
    public function encontrarRota($metodoHTTPRequisicao, $rota)
    {
        // dd($metodoHTTPRequisicao);
        foreach (self::ROTAS as $arrDadosRota) {
            if ($arrDadosRota[0] != $metodoHTTPRequisicao) {
                // dd('e diferente');
                continue;
            }
            $uri = $arrDadosRota[1];
            // dd($uri);
            $strControllerEMetodo = $arrDadosRota[2];
            if ($rota=='autor') {die('<h2>Autores:</h2> <br/> <h3>Gustavo Torres & Igor Machado</h3>');}
            $rotaEncontrada = false;
            $posicaoInicioParametro = stripos($uri, '{');
            $rotaSemParametro = $uri;
            $parametro = null;
            $existeParametro = false;
            if ($posicaoInicioParametro !== false) {
                $rotaSemParametro = substr( $uri, 0, $posicaoInicioParametro);
                $existeParametro = true;
            }
            
            if (!$existeParametro) {
                //verifica se a rota informada é igual a rota definida
                if ($rota == $rotaSemParametro) {
                    $rotaEncontrada = true;
                    break;
                }
            } else {
                //Vai verificar se a parte antes do parametro bate e se tem parametro informado
                $posicaoDaUltimaBarra = strripos($rota,'/');
                $strAntesDaUltimaBarra = $posicaoDaUltimaBarra ? substr($rota,0,$posicaoDaUltimaBarra) : $rota;
                $strDepoisDaUltimaBarra = substr($rota,strlen($strAntesDaUltimaBarra) + 1);
                if (($strAntesDaUltimaBarra . '/' == $rotaSemParametro) && (strlen($strDepoisDaUltimaBarra) > 0)) {
                    $parametro = $strDepoisDaUltimaBarra;
                    $rotaEncontrada = true;
                    break;
                }
            }
        }
        if ($rotaEncontrada) {
            $arrayControllerEMetodo = explode('@',$strControllerEMetodo);
            return [
                'controller' => $arrayControllerEMetodo[0],
                'metodo' => $arrayControllerEMetodo[1],
                'parametro' => $parametro,
            ];
        }
    }

}