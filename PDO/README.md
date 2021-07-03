# PDO - PHP Document Object

https://www.php.net/manual/en/book.pdo.php

PDO é a biblioteca de conexão com bancos de dados mais usados atualmente com PHP.

São vários os SGBDs contemplados pelo PDO atualmente:
```php
    CUBRID (PDO)
    MS SQL Server (PDO)
    Firebird (PDO)
    IBM (PDO)
    Informix (PDO)
    MySQL (PDO)
    MS SQL Server (PDO)
    Oracle (PDO)
    ODBC and DB2 (PDO)
    PostgreSQL (PDO)
    SQLite (PDO)
    4D (PDO)
```

## Constantes predefinidas

Algumas
```php
PDO::PARAM_BOOL (integer)
PDO::PARAM_NULL (integer)
PDO::PARAM_INT (integer)
PDO::PARAM_STR (integer)
```
Muito mais aqui
https://www.php.net/manual/en/pdo.constants.php

## Conexão simples

```php
<?php
$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
?>
```
Um pouco mais elaborada
```php
<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);// Para conectar com o postgresql: $dbh = new PDO('mysql:host...
    foreach($dbh->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
```
Conexão tipo Singleton
```php
<?php 
class Conexao {
    public static $instance;
    private function __construct() {
        //
    }
 
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=testes', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));            
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
       			self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } 
        return self::$instance;
    }
}
```
Para mais detalhes sobre conexões Singleton, veja neste repositório o item Singleton.


