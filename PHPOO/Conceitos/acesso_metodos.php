<?php
class pessoa {
	private $nome;
	public $altura;
	protected $posicao_social;
	private $cpf;

	function __construct($pessoa_nome) {
		$this->nome = $pessoa_nome;
	}

	private function get_cpf() {
		return $this->cpf;
	}
}

$pedro = new pessoa('Pedro Brito'); 
// Descomente para testar
print $pedro->get_cpf(); 

?>
