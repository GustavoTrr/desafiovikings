<?php

namespace Viking\Auth;

use Viking\Models\Usuario;

class Auth {
    
    public static function user()
    {
        $id = $_SESSION['idUsuarioLogado'];
        return Usuario::find($id);
    }

    public static function validarAutenticacaoUsuario()
    {
        if (empty($_SESSION['idUsuarioLogado'])) {
            self::redirecionarParaLogin();
        }
    }

    public static function redirecionarParaLogin()
    {
        if ($_REQUEST['rota'] != 'login') {
            header('location: login');
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
}