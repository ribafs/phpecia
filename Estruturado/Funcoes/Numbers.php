<?php

//Retorna o numero complentando o tamanho com uma determinada qtde de zeros a esquerda
function strzero($valor, $zeros){
	$zeros = $zeros - strlen("$valor");	
	$var = '0';
	for($I=1; $I < $zeros; $I++){
		$var = $var.'0';
	}//fim for
	return("$var$valor");
}


