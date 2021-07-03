<?php
// https://www.youtube.com/watch?v=ZGL2teU41Rw&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=8
// Uma classe abstrata serve de modelo para outras classes e ela não pode ser instanciada.
// As que a extendem são obriadas a possuirem os mesmos métodos que ela

abstract class Banco{
    protected $saldo;
    protected $limiteSaque;
    protected $juros;

    // Adicionando outros métodos para a classe
    public function setSaldo($s){
        $this->saldo = $s;
    }

    public function getSaldo(){
        return $this->saldo;
    }

    // As classes que exendem Banco são obrigadas a definir estes dois métodos
    abstract protected function sacar($s);
    abstract protected function depositar($d);
}

class Itau extends Banco{

    public function sacar($s){
        $this->saldo -= $s;
        echo '<hr>Sacou :'.$s;
    }

    public function depositar($d){
        $this->saldo += $d;
        echo '<hr>Depositou :'.$d;
    }

}

$itau = new Itau();
$itau->setSaldo(1000);
echo '<hr> Saldo: '.$itau->getSaldo();
$itau->sacar(250);
$itau->depositar(500);
echo '<hr> Saldo: '.$itau->getSaldo();
$itau->sacar(250);
echo '<hr> Saldo: '.$itau->getSaldo();

