<?php
require_once('../classes/categories.php');
$category = new Categories($pdo);

$id=$_GET['id'];

$sth = $category->pdo->prepare("SELECT id, category from categories WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_INT); // No select e no delete basta um bindValue
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);

require_once('./header.php');
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$conn->appName?> <br>Atualizar</h3></b></div>
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="">
                <table class="table table-bordered table-responsive table-hover">
                <tr><td><b>Category</td><td><input type="text" name="category" value="<?=$reg->category?>"></td></tr>
                <input name="id" type="hidden" value="<?=$id?>">
                <tr><td></td><td><input name="send" class="btn btn-primary" type="submit" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="back" class="btn btn-warning" type="button" onclick="location='index.php'" value="Back"></td></tr>
                </table>
            </form>
            <?php require_once('../footer.php'); ?>
        </div>
    <div>
</div>

<?php

if(isset($_POST['send'])){

   if($category->update($id)){
        print "<script>location=\"index.php\";</script>";
    }else{
        print "Erro ao alterar o registro!<br><br>";
        exit();
    }
}
?>

