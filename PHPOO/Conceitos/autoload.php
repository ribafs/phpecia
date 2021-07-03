<?php
// Uma alternativa aos includes manuais
/*** Autoload class files ***/
function __autoload($class){
  require('classes/' . strtolower($class) . '.class.php');
}

/*** instantiate a new vehicle class object ***/
$vehicle = new vehicle;

/*** instantiate a new motorcycle class object ***/
$bike = new motorcycle;

/*** instantiate a new printer class object ***/
$printer = new printer;

/*** instantiate a new fax class object ***/
$fax = new fax;

?>
