<?php
include('db.php');
include('function.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare("
			INSERT INTO clientes (nome, email, nascimento) 
			VALUES (:nome, :email, :nascimento)
		");
		$result = $statement->execute(
			array(
				':nome'	=>	$_POST["nome"],
				':email'	=>	$_POST["email"],
				':nascimento'		=>	$_POST["nascimento"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE clientes
			SET nome = :nome, email = :email, nascimento = :nascimento
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':nome'	=>	$_POST["nome"],
				':email'	=>	$_POST["email"],
				':nascimento'		=>	$_POST["nascimento"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>
