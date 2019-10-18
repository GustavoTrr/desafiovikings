<?php

namespace Viking\Models;

use PDO;
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
    public static function getTableName()
    {
        $tableName = get_class_vars(get_called_class())['tableName'];
        
        if (empty($tableName)) {
            $nomeDaClasse = substr(get_called_class(), strripos(get_called_class(), '\\') + 1);
            $nomePadraoTabela = ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $nomeDaClasse)), '_');
            return $nomePadraoTabela;
        } else {
            return $tableName;
        }

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
        $connection = self::getPDOConnection();
        $stmt = $connection->prepare('SELECT * FROM ' . self::getTableName());
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        return $stmt->fetchAll();
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
        return $pdo->exec($sql);
    }

}