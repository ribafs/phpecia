<?php

class Retangulo
{
    public $l, $c;

    public function getPerimetro($x, $y){
        $this->l = $x;
        $this->c = $y;
        return (2 * ($this->l + $this->c));
    }

    public function getArea($x, $y){
        $this->l = $x;
        $this->c = $y;
        return ($this->l * $this->c);
    }
}

$q = new Retangulo();
print 'A área do quadrado é '.$q->getArea(2, 4);

print '<br><br>Perímetro é '.$q->getPerimetro(4,6);

print '<br><br>O lado do quadrado mede '.$q->l;
