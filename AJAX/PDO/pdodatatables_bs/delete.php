<?php

include('db.php');
include("function.php");

if(isset($_POST["id"]))
{
	$id = $_POST["id"];
	$statement = $connection->prepare(
		"DELETE FROM clientes WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}

