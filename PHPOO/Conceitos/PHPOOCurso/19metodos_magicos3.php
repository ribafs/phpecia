<?php
// https://www.youtube.com/watch?v=KlpiwanZat8&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=19
// invoke, toString, get, set
// invoke é chamado quando tentamos usar um objeto como função

class Pessoa {
    private $dados = array();

    // Atribue valor para nome
    public function __set($nome, $valor) {
        $this->dados[$nome] = $valor;
    }

    public function __get($nome) {
        return $this->dados[$nome];
    }

    // Quando tentar imprimir um objeto este método será chamado
    public function __toString() {
        echo 'Tentei imprimir o objeto';
    }

    public function __invoke() {
        echo 'Tentou chamar objeto como função';
    }

}
// Graças a estrutura acima podemos adicionar novos atributos dinamicamente.
// Assim se trabalha com o padrão Active Record
$pessoa = new Pessoa();
echo $pessoa();


