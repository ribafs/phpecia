<?php

require_once '../classes/connection.php';
$conn = new Connection();
$pdo = $conn->pdo;

/* Classe que trabalha com um crud, lidando com uma tabela por vez, que é fornecida a cada instância, desde a conexão com o banco */

class Crud extends Connection
{

	public $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

    public function insert(){

        $descricao = $_POST['descricao'];
        $estoque_minimo = $_POST['estoque_minimo'];
        $estoque_maximo = $_POST['estoque_maximo'];

       try{    
           $stmte = $this->pdo->prepare("INSERT INTO produtos(descricao,estoque_minimo,estoque_maximo) VALUES (?, ?, ?)");
           $stmte->bindParam(1, $descricao, PDO::PARAM_STR);
           $stmte->bindParam(2, $estoque_minimo, PDO::PARAM_INT);
           $stmte->bindParam(3, $estoque_maximo, PDO::PARAM_INT);
           $executa = $stmte->execute();
         
           if($executa){
               return true;
           }
           else{
               return false;
           }
       }catch(PDOException $e){
           echo $e->getMessage();
       }
    }

    public function delete($id){

        $id = $_POST['id'];
        $sql = "DELETE FROM produtos WHERE id = :id";
        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);   

        if( $sth->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update(){

        $id = $_POST['id'];
        $descricao = $_POST['descricao'];
        $estoque_minimo = $_POST['estoque_minimo'];
        $estoque_maximo = $_POST['estoque_maximo'];

        $sql = "UPDATE produtos SET descricao = :descricao, estoque_minimo = :estoque_minimo, estoque_maximo = :estoque_maximo WHERE id = :id";

        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
        $sth->bindParam(':descricao', $_POST['descricao'], PDO::PARAM_STR);   
        $sth->bindParam(':estoque_minimo', $_POST['estoque_minimo'], PDO::PARAM_INT);   
        $sth->bindParam(':estoque_maximo', $_POST['estoque_maximo'], PDO::PARAM_INT);

        if($sth->execute()){
            return true;
        }else{
            return false;
        }
    }
}
