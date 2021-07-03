<?php
require_once('../header.php');
require_once('../classes/compras.php');
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
            <tr><td>Produto</td><td><?=$conn->combo('select id,descricao from produtos order by id')?></td></td></tr>
            <div class="form-group">
            <tr><td>Quantidade</td><td><input type="text" name="quantidade" class="form-control"></td></tr>
            </div>
            <div class="form-group">
            <tr><td>Valor Unitário</td><td><input type="text" name="valor_unitario" class="form-control"></td></tr>
            </div>
            <div class="form-group">
            <tr><td>Data da Compra</td><td><input type="text" name="data_compra" class="form-control"></td></tr>
            </div>
            <tr><td></td><td><input class="btn btn-primary" name="enviar" type="submit" value="Cadastrar">&nbsp;&nbsp;&nbsp;
            <input class="btn btn-warning" name="enviar" type="button" onclick="location='index.php'" value="Voltar"></td></tr>
            </form>
        </table>
        </div>
    </div>

<?php

if(isset($_POST['enviar'])){
    if($crud->insert()){    
       header("location: index.php?msg=Dados inseridos com sucesso!&alert=success");
       exit();
    }else{
	   header("location: index.php?msg=Erro ao inserir o registro!&alert=danger");  
       exit();
    }
}
require_once('../footer.php');
?>

