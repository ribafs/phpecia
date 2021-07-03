<?php

require_once 'config.php';

final class Connection
{

    private static $connection;

    /**
     * Singleton: Método construtor privado para impedir classe de gerar instâncias
     *
     */
    private function __construct()
    {        
    }

    private function __clone()
    {   
    }

    public function __wakeup()
    {   
    }

    /**
     * Método montar string de conexao e gerar o objeto PDO
     * @param $dados array
     * @return PDO
     */
    private static function make(): PDO
    {
        global $sgbd, $usuario, $senha, $banco, $servidor;;
        if (!is_null($sgbd) && !is_null($usuario) && !is_null($senha) && !is_null($banco) && !is_null($servidor)) {
            // selecionar banco - criar string de conexão
            switch (strtoupper($sgbd)) {
                case 'MYSQL' : $porta = isset($porta) ? $porta : 3306;
                    return new PDO("mysql:host={$servidor};port={$porta};dbname={$banco}", $usuario, $senha);
                    break;
                case 'MSSQL' : $porta = isset($porta) ? $porta : 1433;
                    return new PDO("mssql:host={$servidor},{$porta};dbname={$banco}", $usuario, $senha);
                    break;
                case 'PGSQL' : $porta = isset($porta) ? $porta : 5432;
                    return new PDO("pgsql:dbname={$banco}; user={$usuario}; password={$senha}, host={$servidor};port={$porta}");
                    break;
                case 'SQLITE' : return new PDO("sqlite:{$banco}");
                    break;
                case 'OCI8' : return new PDO("oci:dbname={$banco}", $usuario, $senha);
                    break;
                case 'FIREBIRD' : return new PDO("firebird:dbname={$banco}", $usuario, $senha);
                    break;
            }
        } else {
            throw new Exception('Erro: tipo de banco de dados não informado, ou faltam informações no arquivo de configuração');
        }
    }

    /**
     * Método estático que devolve a instancia ativa
     *
     */
    public static function getInstance(string $file): PDO
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
