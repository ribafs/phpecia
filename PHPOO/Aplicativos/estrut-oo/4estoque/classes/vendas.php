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
        $data_venda = $_POST['data_venda'];

           try{
                $this->pdo->beginTransaction();// Iniciar as transações

                // inserir compras
                $stmte = $this->pdo->prepare("INSERT INTO vendas(produto_id,quantidade,valor_unitario,data_venda) VALUES (?, ?, ?, ?)");
                $stmte->bindParam(1, $produto_id, PDO::PARAM_INT);
                $stmte->bindParam(2, $quantidade, PDO::PARAM_INT);
                $stmte->bindParam(3, $valor_unitario, PDO::PARAM_INT);
                $stmte->bindParam(4, $data_venda, PDO::PARAM_STR);
                $executa = $stmte->execute();

                // Verificar estoque mínimo em produtos
                $stmt = $this->pdo->prepare("SELECT estoque_minimo FROM produtos where id = {$produto_id}");
                $stmt->execute();
                $min = $stmt->fetch();

                $stmt = $this->pdo->prepare("SELECT descricao,id FROM estoques where produto_id = {$produto_id}");
                $stmt->execute();
                $quante = $stmt->fetch();
print $quante[0];exit;
               $sql = "UPDATE estoques SET quantidade = :quantidade - $quantidade WHERE id = :id";
               $sthe = $this->pdo->prepare($sql);
               $sthe->bindParam(':id', $quante['id'], PDO::PARAM_INT);   
               $sthe->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);   
               $executa = $sthe->execute(); 

               if(($quante[0] - $quantidade) <= $min[0]){
                    echo '<h4 class="alert-danger">Está tentando vender uma quantidade que deixa a quantidade do produto em estoque menor que o estoque mínimo permiitido para este produto, que é '.$min[0].'</h4>';
                    exit();
               }

               if($executa){
                    return true;
               }
               else{
                    return false;
               }
               $this->pdo->commit();
           }
           catch(PDOException $e){
              echo $e->getMessage();
              $this->pdo->rollBack();
           }
    }

    public function delete($id){

        $id = $_POST['id'];
        $sql = "DELETE FROM vendas WHERE id = :id";
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
            $data_venda = $_POST['data_venda'];

            $sql = "UPDATE vendas SET produto_id = :produto_id, quantidade = :quantidade, valor_unitario = :valor_unitario, data_venda = :data_venda WHERE id = :id";

            $sth = $this->pdo->prepare($sql);
            $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
            $sth->bindParam(':produto_id', $_POST['produto_id'], PDO::PARAM_INT);   
            $sth->bindParam(':quantidade', $_POST['quantidade'], PDO::PARAM_INT);   
            $sth->bindParam(':valor_unitario', $_POST['valor_unitario'], PDO::PARAM_INT);
            $sth->bindParam(':data_venda', $_POST['data_venda'], PDO::PARAM_STR);      

           if($sth->execute()){
                return true;
            }else{
                return false;
            }
    }
}
