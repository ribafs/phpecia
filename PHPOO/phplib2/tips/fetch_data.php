<?php
include_once("../classes/tips.php");
$tip = new Tips($pdo);

if (isset($_POST["page"])) {
    $page_no = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if(!is_numeric($page_no))
        die("Error fetching data! Invalid page number!!!");
} else {
    $page_no = 1;
}

// get record starting position
$start = (($page_no-1) * $conn->regsPerPage);

$results = $tip->pdo->prepare("SELECT * FROM tips ORDER BY id LIMIT $start, $conn->regsPerPage");
$results->execute();

while($row = $results->fetch(PDO::FETCH_ASSOC)) {

$results2 = $tip->pdo->prepare("SELECT category FROM categories where id = ".$row['category_id']);
$results2->execute();
$row2 = $results2->fetch();
$r = $row2['category'];

    echo "<tr>" . 
    "<td>" . $row['id'] . "</td>" . 
    "<td>" . $row['title'] . "</td>" . 
    "<td>" . $r . "</td>";
		?>
	    <td><a href="read.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-zoom-in" title="See"></a></td>
	    <td><a href="update.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-edit" title="Update"></a></td>
	    <td><a href="delete.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-remove-circle" title="Delete"></a></td>
        <!-- onclick="return confirm('Tem certeza de que deseja excluir este registro ?')" -->
<?php
print "
    </tr>";
}


