<?php
require_once('./header.php');
require_once('../classes/tips.php');
$tip = new Tips($pdo);
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$conn->appName?></b> <br>(Adicionar)</h3></div>
        <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6">

        <table class="table table-bordered table-responsive table-hover">    
            <form method="post" action="add.php">           
            <tr><td>Title</td><td><input type="text" name="title" autofocus></td></tr>
            <tr><td>Content</td><td><textarea name="content" rows="10" cols="80"></textarea></td></tr>
            <?=$tip->combo('categories', 'id', 'category', 'category_id', 'tips',$id=null)?>
            <tr><td></td><td><input class="btn btn-primary" name="send" type="submit" value="Send">&nbsp;&nbsp;&nbsp;
            <input class="btn btn-warning" name="back" type="button" onclick="location='index.php'" value="Back"></td></tr>
            </form>
        </table>
        </div>
    </div>
</div>

<?php
if(isset($_POST['send'])){
    if($tip->insert()){
        if($_POST['send']) print '<script>setTimeout(function(){document.location.href = "index.php"},100);</script>';
    }else{
       echo 'Error on insert';
    }
}
require_once('../footer.php');
?>
