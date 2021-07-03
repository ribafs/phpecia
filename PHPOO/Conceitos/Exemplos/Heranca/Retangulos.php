<?php
// Retangulo é mais genérico, enquanto que quadrado é uma especialização de retângulos
class Retangulos
{
    // Declare  properties
    protected $comprimento = 0;
    protected $largura = 0;
    
    // Method to get the perimeter
    public function getPerimetro(){
        return (2 * ($this->comprimento + $this->largura));
    }
    
    // Method to get the area
    public function getArea(){
        return ($this->comprimento * $this->largura);
    }
}


