<?php
class Overloader
{
	function __call($method, $arguments)
	{
		echo "Você chamou o método chamado {$method} com os seguintes argumentos <br/>";
		print_r($arguments);
		echo "<br/>";
	}
}

$ol = new Overloader();
$ol->access(2,3,4);
$ol->notAnyMethod("boo");
//O método __call pega o método que não existe na classe e joga em seu contexto
?>
