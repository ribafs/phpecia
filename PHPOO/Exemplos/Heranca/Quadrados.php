<?php

require_once 'Retangulos.php';

class Quadrados extends Retangulos
{
    public function __construct(){
      $this->largura = 50;
      $this->comprimento = 30;
    }

    public function largura(){     
      return $this->largura;
    }

    public function comprimento(){     
      return $this->comprimento;
    }
    
    public function perimetro(){
        $ret = $this->getPerimetro();
        return $ret;
    }

    public function area(){
      $ret = $this->getArea();
      return $ret;
    }
}

$ret = new Quadrados();

print 'Largura - '.$ret->largura();
print '<hr>';
print 'Comprimento - '.$ret->comprimento();
print '<hr>';

print 'Perímetro - '.$ret->perimetro();
print '<hr>';
print 'Área - '.$ret->area();

//print $ret->largura;// Acusará erro por ser protected
