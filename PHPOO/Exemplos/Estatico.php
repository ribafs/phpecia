<?php
// Uso do $this e do self:: com classes mistas: estáticas e não estáticas

class Estatica
{
    public static $nome = "Manoel";

    public $sobrenome = 'Castro';

    public static function getNome(){
        return self::$nome;
    }

    public function getSobre(){
        return $this->sobrenome;
    }
}

print Estatica::getNome();

$sobre = new Estatica();
print '<hr>';
print $sobre->getSobre();
