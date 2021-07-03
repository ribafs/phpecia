<?php
// Geralmente o método __destruct() é desnecessário, pois quando o script é fechado o PHP é encessado automaticamente

class Destrutor {
   function __construct() {
       print "No construtor<br>";
       $this->name = "ClasseDestrutor";
   }

   function __destruct() {
       print "Destruindo  " . $this->name . "<br>";
   }
}

$objeto = new Destrutor();

