<?php
declare(strict_types = 1);
namespace Core;

class Model extends Connection
{

    private $table = '';
    public $pdo = null;

    function __construct($table)
    {
        $this->table = $table;
        try {
            self::openDb();
        } catch ( PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    // Agora este três métodos abaixo não são criados sempre que se cria um novo crud, mas apenas herdados pelos novos models
    public function todosRegs()
    {
        $sql = 'SELECT * FROM '.$this->table.' ORDER BY id DESC';
//print $sql;exit;
        $query = $this->pdo->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function delete($field_id)
    {
        $sql = 'DELETE FROM '.$this->table.' WHERE id = :field_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':field_id' => $field_id);

        $query->execute($parameters);
    }

    public function somaRegs()
    {
        $sql = 'SELECT COUNT(id) AS soma FROM '.$this->table;
        $query = $this->pdo->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->soma;
    }
}
