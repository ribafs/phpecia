<?php
require_once('../classes/produtos.php');
$crud = new Crud($pdo);

$id=$_GET['id'];

$sth = $pdo->prepare("SELECT * from produtos WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);
$descricao = $reg->descricao;
$estoque_minimo = $reg->estoque_minimo;
$estoque_maximo = $reg->estoque_maximo;

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
                <tr><td><b>Descrição</td><td><?=$conn->combo('select id,descricao from produtos',$id)?></td></tr>
                <tr><td><b>Estoque mínimo</td><td><input type="text" name="estoque_minimo" value="<?=$estoque_minimo?>"></td></tr>
                <tr><td><b>Estoque máximo</td><td><input type="text" name="estoque_maximo" value="<?=$estoque_maximo?>"></td></tr>
                <input name="id" type="hidden" value="<?=$id?>">
                <tr><td></td><td><input name="enviar" class="btn btn-primary" type="submit" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="enviar" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar"></td></tr>
                </table>
            </form>
        </div>
      <div>
    </div>
</div>

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

<?php require_once('../footer.php'); ?>
