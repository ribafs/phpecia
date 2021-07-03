<?php
require 'Retangulo.php';

class Quadrado extends Retangulo
{
    
}

$q = new Quadrado();
print 'A área do quadrado é '.$q->getArea(4, 4);

print '<br><br>Perímetro é '.$q->getPerimetro(4,4);

print '<br><br>O lado do quadrado mede '.$q->l;
