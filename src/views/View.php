<?php

namespace Viking\Views;

/**
 * Classe responsavel pelo roteamento da aplicação
 * Definindo a URI e seu respectivo controller e action
 */
class View {
    public static function renderizar($endereco, $arrVars = [])
    {
        $caminhoCompleto = __DIR__ . '/paginas/' . $endereco . '.php';

        //verifica se o $caminhoCompleto existe
        if (!file_exists($caminhoCompleto)) {
            throw new \Exception("Página não implementada", 1);   
        }

        //Extraíms as variáveis passadas
        extract($arrVars);

        ob_start();
        include($caminhoCompleto);
        $var=ob_get_contents(); 
        ob_end_clean();
        echo $var;
    }

    public static function incluir($endereco, $arrVars = [])
    {
        $caminhoCompleto = __DIR__ . '/paginas/' . $endereco . '.php';

        //Extraíms as variáveis passadas
        extract($arrVars);

        ob_start();
        include($caminhoCompleto);
        $var=ob_get_contents(); 
        ob_end_clean();
        echo $var;
    }
}