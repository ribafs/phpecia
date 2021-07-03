<?php
require_once('../classes/estoques.php');
$crud = new Crud($pdo);

$id=$_GET['id'];

$sth = $pdo->prepare("SELECT * from estoques WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);
$produto_id = $reg->produto_id;
$quantidade = $reg->quantidade;
$valor_unitario = $reg->valor_unitario;

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
                <tr><td><b>ID do Produto</td><td><?=$conn->combo('select id,descricao from produtos',$produto_id)?></td></tr>
                <tr><td><b>Quantidade</td><td><input type="text" name="quantidade" value="<?=$quantidade?>"></td></tr>
                <tr><td><b>Valor Unitário</td><td><input type="text" name="valor_unitario" value="<?=$valor_unitario?>"></td></tr>
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
        print 'Registro alterado com sucesso!';
        header('location: index.php');
        exit();
    }else{
        print "Erro ao alterar o registro!<br><br>";
        exit();
    }
}
?>

