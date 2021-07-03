<?php

//Funcao para formatar cgc tipo -> 99.999.999/9999-99
function formata_cgc($numeros){
	$count = 0;
	$retorno = '';
	if(strlen($numeros)==18){
		$retorno = $numeros;
	} else {
		if(strlen($numeros)==14){
			$retorno = substr($numeros, 0, 2).'.'.
			           substr($numeros, 2, 3).'.'.
					   substr($numeros, 5, 3).'/'.
					   substr($numeros, 8, 4).'-'.
					   substr($numeros, 12, 2);
		} else {
			$retorno = '';
		}
	}
	return("$retorno");
}

//Funcao para formatar cpf tipo -> 999.999.999-99
function formata_cpf($numeros){
	$count = 0;
	$retorno = '';
	if(strlen($numeros)==14){
		$retorno = $numeros;
	} else {
		if(strlen($numeros)==11){
			$retorno = substr($numeros, 0, 3).'.'.
			           substr($numeros, 3, 3).'.'.
					   substr($numeros, 6, 3).'-'.
					   substr($numeros, 9, 2);
		} else {
			$retorno = '';
		}
	}
	return("$retorno");
}


