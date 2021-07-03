<?php
class veiculo{

/*** define public properties ***/

/*** the cor of the veiculo ***/
public $cor;

/*** the number of portas ***/
public $num_portas;

/*** the preco of the veiculo ***/
public $preco;

/*** the modelo of the veiculo ***/
public $modelo;

/*** the marca of veiculo ***/
public $marca;

/*** the constructor ***/
public function __construct(){
  echo 'Sobre este veículo.<br />';
}

/*** define some public methods ***/

/*** a method to show the veiculo preco ***/
public function mostrapreco(){
  echo 'This veiculo custa '.$this->preco.'.<br />';
}

/*** a method to show the number of portas ***/
public function numportas(){
  echo 'This veiculo tem '.$this->num_portas.' portas.<br />';
}

/*** method to dirigir the veiculo ***/
public function dirigir(){
  echo 'VRRROOOOOOM!!!';
}

} /*** end of class ***/
// phppro.org


/*** create a new veiculo object ***/
$veiculo = new veiculo;

/*** the marca of veiculo ***/
$veiculo->marca = 'Porsche';

/*** the modelo of veiculo ***/
$veiculo->modelo = 'Coupe';

/*** the cor of the veiculo ***/
$veiculo->cor = 'Vermelho';

/*** number of portas ***/
$veiculo->num_portas = 2;

/*** cost of the veiculo ***/
$veiculo->preco = 100000;

/*** call the mostrapreco method ***/
$veiculo->mostrapreco();

/*** call the numportas method ***/
$veiculo->numportas();

/*** dirigir the veiculo ***/
$veiculo->dirigir();

?>

