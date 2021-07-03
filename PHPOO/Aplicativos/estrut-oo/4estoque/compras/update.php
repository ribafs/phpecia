<?php
require_once('../classes/compras.php');
$crud = new Crud($pdo);

$id=$_GET['id'];

$sth = $pdo->prepare("SELECT * from compras WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);
$produto_id = $reg->produto_id;
$quantidade = $reg->quantidade;
$valor_unitario = $reg->valor_unitario;
$data_compra = $reg->data_compra;

require_once('../header.php');
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$conn->appName?> <br>Atualizar <?=$conn->currentDirSing()?></h3></b></div>
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="">
                <table class="table table-bordered table-responsive table-hover">
                <div class="form-group">
                <tr><td></td><td><?=$conn->combo('select id,descricao from produtos',$produto_id)?></td></tr>
                </div>
                <div class="form-group">
                <tr><td><b>Quantidade</td><td><input type="text" name="quantidade" value="<?=$quantidade?>" class="form-control"></td></tr>
                </div>
                <div class="form-group">
                <tr><td><b>Valor Unitário</td><td><input type="text" name="valor_unitario" value="<?=$valor_unitario?>" class="form-control"></td></tr>
                </div>
                <div class="form-group">
                <tr><td><b>Data da Compra</td><td><input type="text" name="data_compra" value="<?=$data_compra?>" class="form-control"></td></tr>
                </div>
                <input name="id" type="hidden" value="<?=$id?>">
                <tr><td></td><td><input name="enviar" class="btn btn-primary" type="submit" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="enviar" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar"></td></tr>
                </table>
            </form>
        </div>
      <div>
    </div>
</div>
<?php require_once('../footer.php'); ?>
<?php
if(isset($_POST['enviar'])){
    if($crud->update()){    
       header("location: index.php?msg=Dados alterados com sucesso&alert=success");
       exit();
    }else{
	   header("location: index.php?msg=Erro ao alterar o registro&alert=danger");  
       exit();
    }
}
?>

