<?php
include_once("../classes/estoques.php");
$crud = new Crud($pdo);

if (isset($_POST["page"])) {
    $page_no = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if(!is_numeric($page_no))
        die("Error fetching data! Invalid page number!!!");
} else {
    $page_no = 1;
}

// get record starting position
$start = (($page_no-1) * $crud->regsPerPage);//$row_limit);

$results = $crud->pdo->prepare("SELECT * FROM estoques ORDER BY id LIMIT $start, $crud->regsPerPage");
$results->execute();

while($row = $results->fetch(PDO::FETCH_ASSOC)) {
$resultsp = $crud->pdo->prepare("SELECT descricao FROM produtos where id = ".$row['produto_id']);
$resultsp->execute();
$rowp = $resultsp->fetch(PDO::FETCH_ASSOC);
//print $rowp['descricao'];exit;

    echo "<tr>" . 
    "<td>" . $row['id'] . "</td>" . 
    "<td>" . $rowp['descricao'] . "</td>" . 
    "<td>" . $row['quantidade'] . "</td>" . 
    "<td>" . $row['valor_unitario'] . "</td>";?>
<!--
	    <td><a href="update.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-edit" title="Editar"></a></td>
	    <td><a href="delete.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-remove-circle" title="Excluir"></a></td>
-->
<?php
print "
    </tr>";
}
?>
