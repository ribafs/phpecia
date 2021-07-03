<?php
require_once('./header.php');
require_once('../classes/categories.php');
$category = new Categories($pdo);
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$conn->appName?></b> <br>(Adicionar)</h3></div>
        <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6">

        <table class="table table-bordered table-responsive table-hover">    
            <form method="post" action="add.php">           
            <tr><td>Categoria</td><td><input type="text" name="category" autofocus></td></tr>
            <tr><td></td><td><input class="btn btn-primary" name="enviar" type="submit" value="Cadastrar">&nbsp;&nbsp;&nbsp;
            <input class="btn btn-warning" name="enviar" type="button" onclick="location='index.php'" value="Voltar"></td></tr>
            </form>
        </table>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['enviar'])){
        if($category->insert()){
		   print '<script>location="index.php"</script>';
        }else{
           echo 'Erro ao inserir os dados';
           exit();
        }
    }

require_once('../footer.php');
?>

