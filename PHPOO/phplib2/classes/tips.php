<?php

require_once 'connection.php';
$conn = new Connection();
$pdo = $conn->pdo;

class Tips extends Connection
{
	public $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

    public function insert(){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];

           try{
               $stmte = $this->pdo->prepare("INSERT INTO tips(title,content,category_id) VALUES (?, ?, ?)");
               $stmte->bindParam(1, $title , PDO::PARAM_STR);
               $stmte->bindParam(2, $content , PDO::PARAM_STR);
               $stmte->bindParam(3, $category_id , PDO::PARAM_INT);
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
        $sql = "DELETE FROM tips WHERE id = :id";
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

    public function update(){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];

        $sql = "UPDATE tips SET title = :title, content = :content, category_id = :category_id WHERE id = :id";

        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
        $sth->bindParam(':title', $_POST['title'], PDO::PARAM_STR);   
        $sth->bindParam(':content', $_POST['content'], PDO::PARAM_STR);   
        $sth->bindParam(':category_id', $_POST['category_id'], PDO::PARAM_STR);   

       if($sth->execute()){
            //Registro alterado com sucesso!
            return true;
        }else{
            //Erro ao alterar o registro!
            return false;
        }

    }

    public function combo($tableFk, $idFk, $displayFk, $selected, $tablePk,$id=null){ // $sql='select id,descricao from produtos'
        $sql = 'select '.$idFk.', '.$displayFk.' from '.$tableFk;
        $smt = $this->pdo->prepare($sql);       // $sql do update = 'select produto_id,descricao from produtos',$produto_id
        $smt->execute();
        $data = $smt->fetchAll();

        $sql2 = 'select * from '.$tablePk. ' where id = :id';
        $smt2 = $this->pdo->prepare($sql2);
        $smt2->bindValue(':id', $id, PDO::PARAM_INT); // No select e no delete basta um bindValue, mas isso quando é exigido por :id
        $smt2->execute();
        $data2 = $smt2->fetch();
        $cat = $data2['category_id'];

        $combo = "\n\t\t<tr><td><b>".ucfirst($selected)."</b></td><td><select name=".$selected." class=\"form-control\">";
        foreach ($data as $row){
            if($cat == $row["$idFk"]){
                $combo .= "\t\t".'<option value='.$row["$idFk"].' selected>'.$row["$displayFk"].'</option>'."\n";
            }else{
                $combo .= "\t\t".'<option value='.$row["$idFk"].'>'.$row["$displayFk"].'</option>'."\n";
            }
        }
        $combo .= "\t\t".'</select></td>'."\n";
        return $combo;
    }

}
