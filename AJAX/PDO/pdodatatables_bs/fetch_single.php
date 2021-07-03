<?php
include('db.php');
include('function.php');

if(isset($_POST["id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM clientes 
		WHERE id = '".$_POST["id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nome"] = $row["nome"];
		$output["email"] = $row["email"];
		$output["nascimento"] = $row["nascimento"];
		$output["cpf"] = $row["cpf"];
	}
	echo json_encode($output);
}
?>
