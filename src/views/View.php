<?php

namespace Viking\Views;

/**
 * Classe responsavel pelo roteamento da aplicação
 * Definindo a URI e seu respectivo controller e action
 */
class View {
    public static function renderizar($endereco)
    {
        $caminhoCompleto = __DIR__ . '/paginas/' . $endereco . '.php';
        ob_start();
        include($caminhoCompleto);
        $var=ob_get_contents(); 
        ob_end_clean();
        return $var;
    }
}