<?php
class veiculo{

/*** define propriedades públicas ***/

public $cor;
public $num_portas;
public $preco;
public $modelo;
public $marca;

/*** O construtor ***/
public function __construct(){
  echo 'Sobre este veículo.<br />';
}

/*** Definição de alguns métodos púublicos ***/

public function mostrapreco(){
  echo 'Este veiculo custa '.$this->preco.'.<br />';
}

public function numportas(){
  echo 'Este veiculo tem '.$this->num_portas.' portas.<br />';
}

public function dirigir(){
  echo 'VRRRUUUUUM!!!';
}

} /*** end of class ***/
// Crédito: extinto phppro.org


/*** Criar um novo objeto veiculo ***/
$veiculo = new veiculo;

$veiculo->marca = 'Porsche';
$veiculo->modelo = 'Coupe';
$veiculo->cor = 'Vermelho';
$veiculo->num_portas = 2;
$veiculo->preco = 100000;
$veiculo->mostrapreco();
$veiculo->numportas();
$veiculo->dirigir();
?>

