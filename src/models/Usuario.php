<?php

namespace Viking\Models;

class Usuario extends Model {
    
    protected $tableName = 'usuarios';
    public $id;
    public $nome;
    public $email;
    public $login;
    public $senha;

    /**
     * Função de teste responsável por exibir todos os usuários
     *
     * @return void
     */
    public static function exibirUsuarios()
    {
        dd(self::findAll());
    }

    /**
     * Altera automaticamente a senha do usuário para uma senha randômica e retorna a nova senha criada
     *
     * @return string $senha
     */
    public function alterarSenhaAutomaticamente()
    {
        $novaSenhaTemporaria = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 7)), 0, 7);
        $this->update(['senha' => $novaSenhaTemporaria]);
        return $novaSenhaTemporaria;
    }

    /**
     * @overwrite
     *
     * @param array $arrAtributos
     * @return void
     */
    public static function create(array $arrAtributos = [])
    {
        if (isset($arrAtributos['senha'])) {
            $arrAtributos['senha'] = self::criptografarSenha($arrAtributos['senha']);
        }
        return parent::create($arrAtributos);
    }

    public function update($arrAtributos = [])
    {
        if (isset($arrAtributos['senha'])) {
            $arrAtributos['senha'] = self::criptografarSenha($arrAtributos['senha']);
        }
        return parent::update($arrAtributos);
    }

}