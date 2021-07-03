<?php
// https://www.youtube.com/watch?v=KlpiwanZat8&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=19
// invoke, toString, get, set

class Pessoa {
    private $dados = array();

    // Atribue valor para nome
    public function __set($nome, $valor) {
        $this->dados[$nome] = $valor;
    }

    public function __get($nome) {
        return $this->dados[$nome];
    }

}
// Graças a estrutura acima podemos adicionar novos atributos dinamicamente.
// Assim se trabalha com o padrão Active Record
$pessoa = new Pessoa();
$pessoa->nome = 'Roberto';
$pessoa->idade = 25;
$pessoa->sexo = 'M';
echo $pessoa->nome.'<br>';
echo $pessoa->idade.'<br>';
echo $pessoa->sexo.'<br>';
