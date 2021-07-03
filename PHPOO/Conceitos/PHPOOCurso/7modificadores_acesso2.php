<?php
// https://www.youtube.com/watch?v=S3WuyHmNqeo&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=6
/*
public - pode ser acessado de dentro da classe e de fora dela. É o mais permissivo
private - somente pode ser acessado de dentro da classe onde floi criado
protected - somente pode ser acessado de dentro da classe e nas classes que herdam da classe

Para poder acessar propriedades e métodos private de fora da classe usamos os métodos getters e setteres
*/

class Veiculo{
    // propriedades
    private $modelo;
    public $cor;
    public $ano;

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($m){
        $this->modelo = $m;
    }

    // métodos
    protected function andar(){
        echo 'Andou';
    }

    public function parar(){
        echo 'Parou';
    }
}

// Cada classe deve ficar em um arquivo separado
// Podemos ter propriedades e métodos específicos da classe filha, que não estejam na classe pai
class Carro extends Veiculo{

    public function ligarLimpador(){
        echo 'Limpando em 321...';
    }

    public function mostrarAcao(){
        // Acessando um método da classe pai, que é protected
        $this->andar();
    }

}

// É interessante criar uma classe básica com estes métodos e propriedades e as classes filhas ehrdarem (extends) dela
// Todas as filhas herdam automaticamente tudo da classe pai.

// Testando

$carro = new Carro();
//$carro->andar();
$carro->mostrarAcao();

