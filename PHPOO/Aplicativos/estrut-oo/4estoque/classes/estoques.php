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

        $produto_id = $_POST['produto_id'];
        $quantidade = $_POST['quantidade'];
        $valor_unitario = $_POST['valor_unitario'];

        try{    
           $stmte = $this->pdo->prepare("INSERT INTO estoques(produto_id,quantidade,valor_unitario) VALUES (?, ?, ?)");
           $stmte->bindParam(1, $produto_id, PDO::PARAM_INT);
           $stmte->bindParam(2, $quantidade, PDO::PARAM_INT);
           $stmte->bindParam(3, $valor_unitario, PDO::PARAM_INT);
           $executa = $stmte->execute();
         
           if($executa){
                return true;
           }else{
                return false;
           }
        }catch(PDOException $e){
           echo $e->getMessage();
        }
    }

    public function delete($id){

        $id = $_POST['id'];
        $sql = "DELETE FROM estoques WHERE id = :id";
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
        $produto_id = $_POST['produto_id'];
        $quantidade = $_POST['quantidade'];
        $valor_unitario = $_POST['valor_unitario'];

        $sql = "UPDATE estoques SET produto_id = :produto_id, quantidade = :quantidade, valor_unitario = :valor_unitario WHERE id = :id";

        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
        $sth->bindParam(':produto_id', $_POST['produto_id'], PDO::PARAM_INT);   
        $sth->bindParam(':quantidade', $_POST['quantidade'], PDO::PARAM_INT);   
        $sth->bindParam(':valor_unitario', $_POST['valor_unitario'], PDO::PARAM_INT);   

        if($sth->execute()){
            return true;
        }else{
            return false;
        }
    }
}
