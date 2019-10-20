<?php

namespace Viking\Auth;

use Viking\Models\Usuario;
use Viking\Routes\Routes;

class Auth {
    
    public static function user()
    {
        $id = $_SESSION['idUsuarioLogado'];
        return Usuario::find($id);
    }

    public static function validarAutenticacaoUsuario()
    {
        if (!self::isAuthenticated()) {
            self::redirecionarParaLogin();
        }
    }

    public static function redirecionarParaLogin()
    {
        if ($_REQUEST['rota'] != 'login') {
            header('location: '.Routes::getRotaLogin());
        }
    }

    public static function logar(string $login, string $senha)
    {
        $usuarioEncontrado = Usuario::where(['email' => $login, 'senha' => $senha])->one();
        if (!empty($usuarioEncontrado)) {
            $_SESSION['idUsuarioLogado'] = $usuarioEncontrado->id;
            return true;
        }
        return false;
    }

    public static function logout()
    {
        session_destroy();
        self::redirecionarParaLogin();
    }

    /**
     * Retorna se o usuário atual está ou não autenticado
     *
     * @return boolean
     */
    public static function isAuthenticated()
    {
        return (!empty($_SESSION['idUsuarioLogado']));
    }
}