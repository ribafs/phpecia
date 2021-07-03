<?php

namespace App\Model;

Class Conexao{
    // Usar singleton - manter somente uma instância da conexão
    private static $instance;

    public static function getConn(){
        if(!isset($instance)){
            self::$instance = new \PDO('mysql:host=localhost;dbname=pdo;charset=utf8','root','root');          
        }
        return self::$instance;
    }
}
