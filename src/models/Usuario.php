<?php

namespace Viking\Models;

class Usuario extends Model {
    
    protected $tableName = 'usuarios';
    protected $id;
    protected $nome;
    protected $email;
    protected $login;
    protected $senha;

    /**
     * Função de teste responsável por exibir todos os usuários
     *
     * @return void
     */
    public static function exibirUsuarios()
    {
        dd(self::findAll());
    }
}