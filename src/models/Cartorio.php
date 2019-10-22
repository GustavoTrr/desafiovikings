<?php

namespace Viking\Models;

class Cartorio extends Model {
    
    protected $tableName = 'cartorios';
    public $id;
    public $nome_cartorio;
    public $razao_social;
    public $documento;
    public $tipo_documento;
    public $nome_tabeliao;
    public $telefone;
    public $email;
    public $cep;
    public $endereco;
    public $bairro;
    public $cidade;
    public $uf;
    public $ativo;

    
}