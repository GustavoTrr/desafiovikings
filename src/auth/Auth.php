<?php

namespace Viking\Auth;

use Viking\Mail\Mailer;
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
        $usuarioEncontrado = Usuario::where(['email' => $login, 'senha' => self::criptografarSenha($senha)])->one();
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

    public static function recuperarSenha($email)
    {
        $usuario = Usuario::where(['email' => $email])->one();
        if (!empty($usuario)) {
            $novaSenhaTemporaria = $usuario->alterarSenhaAutomaticamente();
            try {
                Mailer::enviarEmail([$email], 'Recuperação de Senha', 'Sua nova senha temporária é "' . $novaSenhaTemporaria . '" (sem as aspas). <p> Recomendamos trocar a senha assim que entrar no sistema.</p><p><a href="'.appbaseurl().'">'.appbaseurl().'</a></p>');
            } catch (\Throwable $th) {
                throw new \Exception("Erro ao tentar enviar o email de recuperação de senha. :: " . $th->getMessage(), 1);
                
            }
            
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * Undocumented function
     *
     * @param [type] $senhaAntiga
     * @param [type] $senhaNova
     * @return void
     */
    public static function atualizarSenha($senhaAntiga, $senhaNova)
    {
        $usuario = self::user();
        
        if ($usuario->senha == password_hash($senhaAntiga,PASSWORD_BCRYPT)) {
            $usuario->update(['senha' => $senhaNova]);
            return true;
        } else {
            return false;
        }
    }

    public static function criptografarSenha($senha)
    {
        return Usuario::criptografarSenha($senha);
    }

    
}