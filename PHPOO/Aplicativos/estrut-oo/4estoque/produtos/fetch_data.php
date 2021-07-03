<?php
include_once("../classes/produtos.php");
$crud = new Crud($pdo);

if (isset($_POST["page"])) {
    $page_no = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if(!is_numeric($page_no))
        die("Error fetching data! Invalid page number!!!");
} else {
    $page_no = 1;
}

$start = (($page_no-1) * $conn->regsPerPage);

$results = $crud->pdo->prepare("SELECT * FROM produtos ORDER BY id LIMIT $start, $conn->regsPerPage");
$results->execute();

while($row = $results->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>" . 
    "<td>" . $row['id'] . "</td>" . 
    "<td>" . $row['descricao'] . "</td>" . 
    "<td>" . $row['estoque_minimo'] . "</td>" . 
    "<td>" . $row['estoque_maximo'] . "</td>";?>

	 <td><a href="update.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-edit" title="Editar"></a></td>
	 <td><a href="delete.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-remove-circle" title="Excluir"></a></td>
<?php
print "
    </tr>";
}
?>
