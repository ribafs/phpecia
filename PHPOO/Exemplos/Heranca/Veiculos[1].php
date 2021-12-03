<?php
class Veiculos
{
  protected $numRodas;
  protected $numPortas;
  protected $cor;
  protected $fabricante;
  protected $modelo;
  protected $chassi;
  protected $preco;

  protected function mostrarPreco(){
    return $this->preco;
  }

  protected function funcionar(){
    return 'Funcionando ...';
  }

}

// Qualquer classe que extenda esta herdará todos seus métodos e propriedades

require_once 'Motocicletas.php';

$moto = new Motocicletas();

$moto->cor();

require_once 'Testes.php';
$veiculo = new Veiculos();
$veiculo->numRodas;
// Receberá o erro: Fatal error: Uncaught Error: Cannot access protected property Veiculos::$numRoda

