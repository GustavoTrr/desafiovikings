<?php

namespace Viking\Controllers;

use Viking\Views\View;

/**
 * Classe exemplo de controller
 */
class TesteController extends Controller {
    
    public function testar()
    {
        echo "Nosso primeiro teste deu certo!";
    }

    public function primeiraPagina()
    {
        return View::renderizar('primeiroteste');
    }
}