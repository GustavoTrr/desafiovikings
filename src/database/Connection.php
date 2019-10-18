<?php

namespace Viking\Database;

use PDO;
use Viking\Config\DatabaseConfig;

final class Connection
{
    private static $connection;

    /**
     * Singleton: Método construtor privado para impedir classe de gerar instâncias
     *
     */
    private function __construct()
    { }

    private function __clone()
    { }

    private function __wakeup()
    { }


    /**
     * Método montar string de conexao e gerar o objeto PDO
     * @param $dados array
     * @return PDO
     */

    private static function make(): PDO
    {
        // capturar dados
        $sgdb     = DatabaseConfig::getDriver();
        $usuario  = DatabaseConfig::getUser();
        $senha    = DatabaseConfig::getPassword();
        $banco    = DatabaseConfig::getDB();
        $servidor = DatabaseConfig::getHost();
        $porta    = DatabaseConfig::getPort();

        if (!is_null($sgdb)) {
            // selecionar banco - criar string de conexão
            switch (strtoupper($sgdb)) {
                case 'MYSQL':
                    $porta = isset($porta) ? $porta : 3306;
                    return new PDO("mysql:host={$servidor};port={$porta};dbname={$banco}", $usuario, $senha);
                    break;
                case 'MSSQL':
                    $porta = isset($porta) ? $porta : 1433;
                    return new PDO("mssql:host={$servidor},{$porta};dbname={$banco}", $usuario, $senha);
                    break;
                case 'PGSQL':
                    $porta = isset($porta) ? $porta : 5432;
                    return new PDO("pgsql:dbname={$banco}; user={$usuario}; password={$senha}, host={$servidor};port={$porta}");
                    break;
                case 'SQLITE':
                    return new PDO("sqlite:{$banco}");
                    break;
                case 'OCI8':
                    return new PDO("oci:dbname={$banco}", $usuario, $senha);
                    break;
                case 'FIREBIRD':
                    return new PDO("firebird:dbname={$banco}", $usuario, $senha);
                    break;
            }
        } else {
            throw new Exception('Erro: Driver de banco de dados não informado');
        }
    }

    /**
     * Método estático que devolve a instancia ativa
     *
     */
    public static function getInstance(): PDO
    {
        if (self::$connection == NULL) {
            // Receber os dados do arquivo
            self::$connection = self::make();
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->exec("set names utf8");
        }
        return self::$connection;
    }
}
