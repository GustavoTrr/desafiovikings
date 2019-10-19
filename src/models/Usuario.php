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
}