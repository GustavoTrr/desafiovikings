<?php

namespace Viking\Controllers;

use Viking\Auth\Auth;
use Viking\Models\Model;
use Viking\Models\Usuario;
use Viking\Request\Request;
use Viking\Routes\Routes;
use Viking\Views\View;

/**
 * Classe LoginController
 */
class LoginController extends Controller {
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function loginForm()
    {
        if (Auth::isAuthenticated()) {
            header('location: ' . Routes::getRotaInicialAutenticada());
        } else {
            echo View::renderizar('login');
        }
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function logar(Request $request)
    {
        if (Auth::logar($request->get('login'), $request->get('senha'))) {
            header('location: ' . Routes::getRotaInicialAutenticada());
        } else {
            self::loginForm();
        }
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function recuperarSenhaForm()
    {

    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function recuperarSenha(Request $request)
    {

    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function alterarSenhaForm()
    {

    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function alterarSenha(Request $request)
    {

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
    }

}