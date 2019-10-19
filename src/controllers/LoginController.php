<?php

namespace Viking\Controllers;

use Viking\Auth\Auth;
use Viking\Models\Model;
use Viking\Models\Usuario;
use Viking\Request\Request;
use Viking\Views\View;

/**
 * Classe LoginController
 */
class LoginController extends Controller {
    
    public function apresentarFormularioDeLogin()
    {
        echo View::renderizar('login');
    }

    public function logar(Request $request)
    {
        if (Auth::logar($request->get('login'), $request->get('senha'))) {
            die('Você está Logado!');
        }
    }

    public function logout()
    {
        Auth::logout();
    }

}