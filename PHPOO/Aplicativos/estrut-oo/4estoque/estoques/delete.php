<?php
require_once('../classes/estoques.php');
$crud = new Crud($pdo);

$id=$_GET['id'];

$sth = $crud->pdo->prepare("SELECT * from estoques WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR);
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);
$produto_id = $reg->produto_id;
$quantidade = $reg->quantidade;
$valor_unitario = $reg->valor_unitario;

require_once('../header.php');
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$conn->appName?> <br> Excluir <?=$conn->currentDirSing()?></h3></b></div>
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Realmente excluir o registro abaixo?</h3>
            <br>
            <b>ID:</b> <?=$id?><br>
            <b>ID do Produto:</b> <?=$produto_id?><br>
            <b>Quantidade:</b> <?=$quantidade?><br>
            <b>Valor Unitário:</b> <?=$valor_unitario?><br>

            <br>
            <form method="post" action="">
            <input name="id" type="hidden" value="<?=$id?>">
            <input name="enviar" class="btn btn-danger" type="submit" value="Excluir!">&nbsp;&nbsp;&nbsp;
            <input name="enviar" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar">
            </form>
            <br><br><br>
          </div>
        </div>
    <div>
</div>

<?php
if(isset($_POST['enviar'])){
    if($crud->delete($id)){
        echo 'Registro excluído com sucesso';
        header('location: index.php');
    }else{
        echo 'Erro ao excluir o registro';
        exit();
    }
}
?>
<?php require_once('../footer.php'); ?>
