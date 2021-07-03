<?php

// Novo recurso do PHP5
function __autoload($class_name){
	require_once(dirname(__FILE__).'/classes/class.'.strtolower($class_name).'.php');
}
?>
