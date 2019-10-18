<?php

namespace Viking\Models;

use Viking\Database\Connection;

class Model {

    //As classes filhas (que estendem esta classe), devem ter os atributos aqui definidos normalmente como na clássica classe OO.
    //Com seu modificador de acesso definido da forma que o programador quiser e com os nomes exatamente iguais aos que estão na tabela
    //Fica a critário do programador colocar atributos virtuais, ou seja, além dos que estão na tabela do banco de dados. Porém neste caso, deve anotá-los também na variável $virtualAttributes

    /**
     * Este atributo deve guardar a lista de todos os atributos que não estão representados no banco de dados
     */
    protected $virtualAttributes = [];
    protected $tableName;


    /**
     * Cria a string de conexão com o Banco de dados e retorna o objeto PDO
     *
     * @return PDO $instanciaPDO
     */
    public static function getPDOConnection()
    {
        return Connection::getInstance();
    }


    /**
     * Função retornará o atributo $tableName, e se não estiver definido retornará o nome da classe convertido para "snake_case"
     *
     * @return void
     */
    public function getTableName()
    {

    }

    public static function create(array $arrAtributos = [])
    {

    }

    public static function find()
    {

    }

    public function where()
    {

    }

    public function one()
    {

    }

    public function all()
    {

    }

    public static function findAll()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    /**
     * Método genérico para execução direta de instrução SQL
     *
     * @param string $sql
     * @return void
     */
    public static function executeSQL($sql)
    {
        $pdo = self::getPDOConnection();
        $affectedRows = $pdo->exec('CREATE TABLE `primeira` (
            `id` INT NOT NULL,
            `nome` VARCHAR(45) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `nome_UNIQUE` (`nome` ASC));
          ');
          dd('NR: ' . $affectedRows);
        // $con = connection::getInstance();
// echo (is_a($con, 'PDO'))?'Instanciado com êxito' :'Não deu certo!';
    }

}