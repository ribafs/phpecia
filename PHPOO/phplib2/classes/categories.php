<?php

require_once 'connection.php';
$conn = new Connection();
$pdo = $conn->pdo;

/* Classe que trabalha com um crud, lidando com uma tabela por vez, que é fornecida a cada instância, desde a conexão com o banco */

class Categories extends Connection
{
	public $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

    public function insert(){
        $category = $_POST['category'];

           try{
               $stmte = $this->pdo->prepare("INSERT INTO categories(category) VALUES (?)");
               $stmte->bindParam(1, $category , PDO::PARAM_STR);
               $executa = $stmte->execute();
         
               if($executa){
                   //echo 'Dados inseridos com sucesso';
                   return true;
               }else{
                   //echo 'Erro ao inserir os dados';
                   return false;
               }
           }
           catch(PDOException $e){
              echo $e->getMessage();
           }
    }

    public function delete($id){
        $sql = "DELETE FROM categories WHERE id = :id";
        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);   

        if( $sth->execute()){
            //Registro excluído com sucesso!
            return true;
        }else{
            //Erro ao exclur o registro!
            return false;
        }

    }

    public function update($id){
        $category = $_POST['category'];

        $sql = "UPDATE categories SET category = :category WHERE id = :id";

        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
        $sth->bindParam(':category', $_POST['category'], PDO::PARAM_STR);   

       if($sth->execute()){
            //Registro alterado com sucesso!
            return true;
        }else{
            //Erro ao alterar o registro!
            return false;
        }

    }
}
