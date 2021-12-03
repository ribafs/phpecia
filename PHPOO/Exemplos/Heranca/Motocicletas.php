<?php
class Motocicletas extends Veiculos
{
  protected function testes(){
    $this->numRodas = 2;
    $this->numPortas = 0;
    $this->cor = 'preta';
    $this->fabricante = 'Honda';
    $this->modelo = 'ML 125';
    $this->preco = 65000;
    print $this->numRodas;
    print '<hr>';
    print $this->mostrarPreco();
  }

  public function cor(){
    $this->cor = 'preta';
    print $this->cor;
  }
}
