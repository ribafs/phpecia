<?php

/*** include the veiculo class definition ***/
include('class.veiculo.php');

class motocicleta extends veiculo{

/*** the number of side cars ***/
private $num_sidecars;

private $guidon;

/**
*
* set the type of guidon
*
* @access public
*
* @param string
*
* @return string
*
**/
public function setguidon($guidonTipo){
  $this->guidon=$guidonTipo;
}

/**
*
* Set number of side cars
*
* @access public
*
* @param int
*
* @return int
*
**/
public function setSidecar($numSidecars){
  $this->numSidecars = $numSidecars;
}


/**
*
* Show the numbers of sidecars
*
* @return string
*
**/
public function showSideCar(){
  echo 'This motorcyle has '. $this->numSidecars.' sidecar<br />';
}

} /*** end of class ***/


/*** our userland code ***/

/*** create a new veiculo object ***/
$veiculo = new motocicleta;

/*** the marca of veiculo ***/
$veiculo->marca = 'Harley Davidson';

/*** the modelo of veiculo ***/
$veiculo->modelo = 'Sportster';

/*** the color of the veiculo ***/
$veiculo->color = 'Preta';

/*** number of doors ***/
$veiculo->num_doors = 0;

/*** cost of the veiculo ***/
$veiculo->Preco = 25000;

/*** type of handle bars ***/
$veiculo->setguidon('Cabides Ape');

/*** set the sidecar ***/
$veiculo->setSidecar(1);

/*** show the veiculo marca and type ***/
echo $veiculo->marca.': '.$veiculo->modelo.'<br />';


/*** call the showPreco method ***/
$veiculo->showPreco();

/*** show the sidecars ***/
$veiculo->showSideCar();

/*** dirigir the veiculo ***/
$veiculo->dirigir();

?>

