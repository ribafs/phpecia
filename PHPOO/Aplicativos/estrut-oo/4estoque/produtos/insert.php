<?php
require_once('../header.php');
require_once('../classes/produtos.php');
$crud = new Crud($pdo);
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$conn->appName?> <br> (Adicionar <?=$conn->currentDirSing()?>)</b></h3></div>
        <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6">

        <table class="table table-bordered table-responsive table-hover">    
            <form method="post" action="insert.php">           
            <tr><td>Descrição</td><td><input type="text" name="descricao" autofocus></td></tr>
            <tr><td>Estoque mínimo</td><td><input type="text" name="estoque_minimo"></td></tr>
            <tr><td>Estoque máximo</td><td><input type="text" name="estoque_maximo"></td></tr>
            <tr><td></td><td><input class="btn btn-primary" name="enviar" type="submit" value="Cadastrar">&nbsp;&nbsp;&nbsp;
            <input class="btn btn-warning" name="enviar" type="button" onclick="location='index.php'" value="Voltar"></td></tr>
            </form>
        </table>
        </div>
    </div>
</div>

<?php

if(isset($_POST['enviar'])){
    if($crud->insert()){
       header("location: index.php?msg=Dados inseridos com sucesso&alert=success");
       exit();
    }else{
	   header("location: index.php?msg=Erro ao inserir o registro&alert=danger");  
       exit();
    }
}
require_once('../footer.php');
?>

