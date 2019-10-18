<?php

namespace Viking\Controllers;

use Viking\Views\View;

/**
 * Classe LoginController
 */
class LoginController extends Controller {
    
    public function apresentarFormularioDeLogin()
    {
        echo "Apresentar formulário de login";
    }

    public function logar()
    {
        echo "Logar";
    }

}