<?php
require_once('header.php');
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b>Paginação Simples <br> (Adicionar)</h3></b></div>
        <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6">

        <table class="table table-bordered table-responsive table-hover">    
            <form method="post" action="insert.php">           
            <tr><td>Name</td><td><input type="text" name="name" autofocus></td></tr>
            <tr><td>E-mail</td><td><input type="text" name="email"></td></tr>
            <tr><td>City</td><td><input type="text" name="city"></td></tr>
            <tr><td></td><td><input class="btn btn-primary" name="enviar" type="submit" value="Cadastrar">&nbsp;&nbsp;&nbsp;
            <input class="btn btn-warning" name="enviar" type="button" onclick="location='index.php'" value="Voltar"></td></tr>
            </form>
        </table>
        </div>
    </div>
</div>

<?php
require_once('db_connect.php');

if(isset($_POST['enviar'])){
$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];

   try{
       $stmte = $pdo->prepare("INSERT INTO customers(name,email,city) VALUES (?, ?, ?)");
       $stmte->bindParam(1, $name , PDO::PARAM_STR);
       $stmte->bindParam(2, $email , PDO::PARAM_STR);
       $stmte->bindParam(3, $city , PDO::PARAM_STR);
       $executa = $stmte->execute();
 
       if($executa){
           echo 'Dados inseridos com sucesso';
		   header('location: index.php');
       }
       else{
           echo 'Erro ao inserir os dados';
            exit;
       }
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
}
require_once('footer.php');
?>

