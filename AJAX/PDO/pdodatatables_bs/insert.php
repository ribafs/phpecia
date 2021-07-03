<?php
include('db.php');
include('function.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare("
			INSERT INTO clientes (nome, email, nascimento, cpf) 
			VALUES (:nome, :email, :nascimento, :cpf)
		");
		$result = $statement->execute(
			array(
				':nome'	=>	$_POST["nome"],
				':email'	=>	$_POST["email"],
				':nascimento'		=>	$_POST["nascimento"],
				':cpf'	=>	$_POST["cpf"]
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
			SET nome = :nome, email = :email, nascimento = :nascimento, cpf = :cpf  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':nome'	=>	$_POST["nome"],
				':email'	=>	$_POST["email"],
				':nascimento'		=>	$_POST["nascimento"],,
				':cpf'		=>	$_POST["cpf"],,
				':id'			=>	$_POST["id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}
