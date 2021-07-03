<?php
require_once('../classes/tips.php');
$tip = new Tips($pdo);

$id=$_GET['id'];

$sth = $tip->pdo->prepare("SELECT id,title,content,category_id from tips WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_INT);
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);
$title = $reg->title;
$content = $reg->content;
$category_id = $reg->category_id;

require_once('./header.php');
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$conn->appName?> <br> Excluir</h3></b></div>
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Really remove register below?</h3>
            <br>
            <b>ID:</b> <?=$id?><br>
            <b>Title:</b> <?=$title?><br>
            <b>Content:</b> <?=$content?><br>
            <b>Category:</b> <?=$category_id?><br>
            <br>
            <form method="post" action="">
            <input name="id" type="hidden" value="<?=$id?>">
            <input name="send" class="btn btn-danger" type="submit" value="Excluir!">&nbsp;&nbsp;&nbsp;
            <input name="back" class="btn btn-warning" type="button" onclick="location='index.php'" value="Back">
            </form>
            <br><br><br>
        <?php require_once('../footer.php'); ?>
        </div>
    <div>
</div>

<?php

if(isset($_POST['send'])){
    $id = $_POST['id'];

    if( $tip->delete($id)){
        print "<script>alert('Sucessuful removed!');location='index.php';</script>";
    }else{
        print "Error on remove the register!<br><br>";
        exit();
    }
}
?>
