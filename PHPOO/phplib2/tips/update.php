<?php
require_once('../classes/tips.php');
$tip = new Tips($pdo);

$id=$_GET['id'];

$sth = $tip->pdo->prepare("SELECT id,title,content,category_id from tips WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR);
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
                <tr><td><b>Title</td><td><input type="text" name="title" value="<?=$reg->title?>"></td></tr>
                <tr><td><b>Content</td><td><input type="text" name="content" value="<?=$reg->content?>"></td></tr>
                <?=$tip->combo('categories', 'id', 'category', 'category_id', 'tips',$id)?>
                <input name="id" type="hidden" value="<?=$id?>">
                <tr><td></td><td><input name="send" class="btn btn-primary" type="submit" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="back" class="btn btn-warning" type="button" onclick="location='index.php'" value="Back"></td></tr>
                </table>
            </form>
            <?php require_once('../footer.php'); ?>
        </div>
    <div>
</div>

<?php

if(isset($_POST['send'])){

   if($tip->update()){
        if($_POST['send']) print "<script>setTimeout(function(){document.location.href = \"index.php\"},100);</script>";
    }else{
        print "Error on register update!<br><br>";
        exit();
    }
}
?>

