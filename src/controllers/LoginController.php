<?php

namespace Viking\Controllers;

use Viking\Auth\Auth;
use Viking\Mail\Mailer;
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
            View::renderizar('login');
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
            View::renderizar('login', ['erroDeCredencial' => true]);
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
        View::renderizar('recuperarsenha');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function recuperarSenha(Request $request)
    {
        //Verifica se existe o email informado
        $email = $request->get('email');
        
        if (Auth::recuperarSenha($email)) {
            //Se deu tudo certo, exibe mensagem com orientação
            View::renderizar('recuperarsenha', ['msgDeSucesso' => 'Um email de recuperação de senha foi enviado para você!']);
        } else {
            //se não exibe mensagem de erro
            View::renderizar('recuperarsenha', ['erroDeCredencial' => true]);
        }
        //se sim, envia o email e exbe mensagem com orientação
        //cria nova senha
        
    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function alterarSenhaForm()
    {
        View::renderizar('alterarsenha');
    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function alterarSenha(Request $request)
    {
        echo Auth::atualizarSenha($request->get('senha_antiga'), $request->get('senha_nova'));
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