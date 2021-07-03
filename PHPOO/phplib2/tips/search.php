<?php 
require_once('./header.php');
require_once('../classes/tips.php');
$tip = new Tips($pdo);

// Search
if(isset($_GET['keyword'])){
    $keyword=$_GET['keyword'];

    $sql = "select * from tips WHERE title LIKE :keyword order by id";
    $sth = $tip->pdo->prepare($sql);
    $sth->bindValue(":keyword", $keyword."%");
    $sth->execute();
    $rows =$sth->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$conn->appName;?></b></h3></div>
<?php
print '<div class="text-center"><h4><b>Registro(s) encontrado(s)</b>: '.count($rows).' com '.$keyword.'</h4></div>';

if(count($rows) > 0){
?>

    <table class="table table-hover">
        <thead>  
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
            </tr>
        </thead>

<?php
    // Loop através dos registros recebidos
    foreach ($rows as $row){
        echo "<tr>" . 
        "<td>" . $row['id'] . "</td>" . 
        "<td>" . $row['title'] . "</td>" . 
        "<td>" . $row['content'] . "</td>" . 
        "<td>" . $row['category_id'] . "</td>"?>
            <td><a href="update.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-edit" title="Update"></a></td>
            <td><a href="delete.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-remove-circle" title="Delete"></a></td></tr>
        <?php
        "</tr>";
    } 
    echo "</table>";

}else{
    print '<h3>None register where found!</h3>
</div>';
}
?>

<div class="text-center"><input name="send" class="btn btn-warning" type="button" onclick="location='index.php'" value="Back"></div>
</div>
<br>
<?php require_once('../footer.php'); ?>
