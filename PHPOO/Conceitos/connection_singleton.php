<?php
/*
Let us take a look at three functions of this class:

    __construct(): This is the constructor of class Database. Since it is a static class, initialization of this class is not allowed. To prevent misuse of the class, we use a "die" function to remind users.
    connect: This is the main function of this class. It uses singleton pattern to make sure only one PDO connection exist across the whole application. Since it is a static method. We use Database::connect() to create a connection.
    disconnect: Disconnect from database. It simply sets connection to NULL. We need to call this function to close connection.
//https://www.startutorial.com/articles/view/php-crud-tutorial-part-1
*/
class Database
{
    private static $db = 'crud' ;
    private static $host = 'localhost' ;
    private static $user = 'root';
    private static $pass = 'root';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$host.";"."dbname=".self::$db, self::$user, self::$pass); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
