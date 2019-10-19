<?php

namespace Viking\Routes;

use Viking\Auth\Auth;
use Viking\Config\RoutesConfig;
use Viking\Request\Request;

/**
 * Classe responsavel pelo roteamento da aplicação
 * Definindo a URI e seu respectivo controller e action
 */
class Routes {

    /**
     * Direcionamento da Requisição
     * Esta função é responsável por interpretar a rota definida na URI 
     * e chamar o controller e o método correspondente como definido na constante ROTAS do arquivo de configuração RoutesConfig
     *
     * @param string metodoHTTP
     * @param string $rotaSolicitada
     * @param array $arrQueryItens
     * @return void
     */
    public function direcionarRequisicao($metodoHTTP, $rotaSolicitada, $arrQueryItens)
    {
        // dd($arrQueryItens);//@todo esse queryItens deve virar atributo de uma classe Request
        $arrDadosRotaEncontrada = $this->encontrarRota($metodoHTTP, $rotaSolicitada);

        if ($arrDadosRotaEncontrada) {
            if ($arrDadosRotaEncontrada['necessitaAutenticacao']) {
                $this->verificarLogin($rotaSolicitada);
            }
            // dd(new Request());
            $requisicao = new Request();
            $requisicao->receberParametrosDaRequisicao($arrQueryItens);
            $controller = $arrDadosRotaEncontrada['controller'];
            $acao = $arrDadosRotaEncontrada['metodo'];
            $classe =  '\\Viking\\Controllers\\' . $controller;
            $obj = new $classe;
            if (!empty($arrDadosRotaEncontrada['parametro'])) {
                echo $obj->$acao($requisicao, $arrDadosRotaEncontrada['parametro']);
            } else {
                echo $obj->$acao($requisicao);
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
        foreach (RoutesConfig::ROTAS as $arrDadosRota) {
            if ($arrDadosRota[0] != $metodoHTTPRequisicao) {
                continue;
            }
            $uri = $arrDadosRota[1];
            $strControllerEMetodo = $arrDadosRota[2];
            $necessitaAutenticacao = $arrDadosRota[3] ?? false;
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
                'necessitaAutenticacao' => $necessitaAutenticacao,
            ];
        }
    }

    /**
     * Função responsável por verificar se o usuário já está autenticado no sistema
     *
     * @return void
     */
    public function verificarLogin()
    {
        Auth::validarAutenticacaoUsuario();
    }

    /**
     * Função responsável por retornar a base da url da aplicação
     *
     * @return void
     */
    public static function getBaseURL()
    {
        return 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, -(strlen($_REQUEST['rota'])+1));
    }

}