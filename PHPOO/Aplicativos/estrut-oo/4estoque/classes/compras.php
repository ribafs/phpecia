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

        try{
            $produto_id = $_POST['produto_id'];
            $quantidade = $_POST['quantidade'];
            $valor_unitario = $_POST['valor_unitario'];
            $data_compra = $_POST['data_compra'];

            $this->pdo->beginTransaction();// Iniciar as transações
            // inserir compras
            $stmte = $this->pdo->prepare("INSERT INTO compras(produto_id,quantidade,valor_unitario,data_compra) VALUES (?, ?, ?, ?)");
            $stmte->bindParam(1, $produto_id, PDO::PARAM_INT);
            $stmte->bindParam(2, $quantidade, PDO::PARAM_INT);
            $stmte->bindParam(3, $valor_unitario, PDO::PARAM_INT);
            $stmte->bindParam(4, $data_compra, PDO::PARAM_STR);
            $executa = $stmte->execute();

            // Verificar estoque máximo em produtos
            $stmt = $this->pdo->prepare("SELECT estoque_maximo FROM produtos where id = ".$produto_id);
            $stmt->execute();
            $max = $stmt->fetch();

            // Trazer a quantidade do produto atual em estoques
            $stmt = $this->pdo->prepare("SELECT quantidade FROM estoques where produto_id = {$produto_id}");
            $stmt->execute();
            $quante = $stmt->fetch();

            // Trazer a quantidade do produto atual em compras
            $stmt = $this->pdo->prepare("SELECT quantidade FROM compras where produto_id = {$produto_id}");
            $stmt->execute();
            $quantc = $stmt->fetch();

            // Verificar se a quantidade digitada no form somada com a quantidade em estoque no produto atual se são maiores que o
                // estoque máximo do produto atual
            if(($quantidade+$quante[0]) >= $max[0]){
                echo '<h4 class="alert-danger">Está tentando comprar uma quantidade maior ou igual ao estoque máximo permiitido para este produto, que é '.$max[0].' O estoque é a soma da compra com a quantidade em estoque.</h4>';
                exit();
            }

            // Estoques, inserido somente aqui para evitar interferências nas operações anteriores
            $stmte = $this->pdo->prepare("INSERT INTO estoques(produto_id,quantidade,valor_unitario) VALUES (?, ?, ?)");
            $stmte->bindParam(1, $produto_id, PDO::PARAM_INT);
            $stmte->bindParam(2, $quantidade, PDO::PARAM_INT);
            $stmte->bindParam(3, $valor_unitario, PDO::PARAM_INT);
            $executa = $stmte->execute();

            // Verificar se a quantidade comprada somada à quantidade em estoque no produto atual são maiores qua o estoque máximo
            if(($quantc[0]+$quante[0]) >= $max[0]){
                echo '<h4 class="alert-danger">Está tentando comprar uma quantidade maior ou igual ao estoque máximo permiitido para este produto, que é '.$max[0].' O estoque é a soma da compra com a quantidade em estoque.</h4>';
                exit();
            }

            $this->pdo->commit();// Finalizando e concretizando a transação

            if($executa){
                return true;
            }else{
                return false;
            }
		}catch(PDOException $e){
            // Usar estas linhas no catch apenas em ambiente de testes/desenvolvimento. Em produção h4 o exit()
            $this->pdo->rollBack(); // Cancelando a transação
			echo '<br><br><b>Código</b>: '.$e->getCode().'<hr>';
			echo '<h4>Mensagem</b>: '. $e->getMessage().'. Operação abortada.</h4>';
			echo '<b>Arquivo</b>: '.$e->getFile().'<br>';
			echo '<b>Linha</b>: '.$e->getLine().'<br>';
			exit();
		}
    }

    public function delete($id){

        try{
            $id = $_POST['id'];
            $sql = "DELETE FROM compras WHERE id = :id";
            $sth = $this->pdo->prepare($sql);
            $sth->bindParam(':id', $id, PDO::PARAM_INT);   

            if( $sth->execute()){
                return true;
            }else{
                return false;
            }
		}catch(PDOException $e){
            // Usar estas linhas no catch apenas em ambiente de testes/desenvolvimento. Em produção apenas o exit()
			echo '<br><br><b>Código</b>: '.$e->getCode().'<hr>';
			echo '<b>Mensagem</b>: '. $e->getMessage().'<br>';
			echo '<b>Arquivo</b>: '.$e->getFile().'<br>';
			echo '<b>Linha</b>: '.$e->getLine().'<br>';
			exit();
        }

    }

    public function update(){

        try{
            $id = $_POST['id'];
            $produto_id = $_POST['produto_id'];
            $quantidade = $_POST['quantidade'];
            $valor_unitario = $_POST['valor_unitario'];
            $data_compra = $_POST['data_compra'];

            $sql = "UPDATE compras SET produto_id = :produto_id, quantidade = :quantidade, valor_unitario = :valor_unitario, data_compra = :data_compra WHERE id = :id";

            $sth = $this->pdo->prepare($sql);
            $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
            $sth->bindParam(':produto_id', $_POST['produto_id'], PDO::PARAM_INT);   
            $sth->bindParam(':quantidade', $_POST['quantidade'], PDO::PARAM_INT);   
            $sth->bindParam(':valor_unitario', $_POST['valor_unitario'], PDO::PARAM_INT);
            $sth->bindParam(':data_compra', $_POST['data_compra'], PDO::PARAM_STR);      

           if($sth->execute()){
                return true;
            }else{
                return false;
            }
		}catch(PDOException $e){
            // Usar estas linhas no catch apenas em ambiente de testes/desenvolvimento. Em produção apenas o exit()
			echo '<br><br><b>Código</b>: '.$e->getCode().'<hr>';
			echo '<b>Mensagem</b>: '. $e->getMessage().'<br>';
			echo '<b>Arquivo</b>: '.$e->getFile().'<br>';
			echo '<b>Linha</b>: '.$e->getLine().'<br>';
			exit();
		}
    }
}
