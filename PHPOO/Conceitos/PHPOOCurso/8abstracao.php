<?php
// https://www.youtube.com/watch?v=ZGL2teU41Rw&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=8
// Uma classe abstrata serve de modelo para outras classes e ela não pode ser instanciada.
// As que a extendem são obriadas a possuirem os mesmos métodos que ela

abstract class Banco{
    protected $saldo;
    protected $limiteSaque;
    protected $juros;

    // As classes que exendem Banco são obrigadas a definir estes dois métodos
    abstract protected function sacar();
    abstract protected function depositar();
}

class Itau extends Banco{

    public function sacar(){
        echo 'Sacou';
    }

    public function depositar(){
        echo 'Depositou';
    }

}

$itau = new Itau();
$itau->sacar();
