<?php
class pessoa {
	// Adicionar propriedades explicitamente para a classe é opcional, mas uma boa prática
	var $nome;

	function __construct($pessoa_nome) {
		$this->name = $pessoa_nome;
	}

	public function get_nome() {
		return $this->nome;
	}

	// Métodos e propriedades protected restringem o acesso para esses elementos.
	protected function set_nome($novo_nome) {
		if ($nome != "João Costa") {
			$this->nome = strtoupper($novo_nome);
		}
	}
}

// 'extends' é a palavra reservada que habilita herança
class funcionario extends pessoa {
	protected function set_nome($novo_nome) {
		if ($novo_nome == "Pedro José") {
			$this->nome = $novo_nome;
		}
	}
	function __construct($funcionario_nome) {
		$this->set_nome($funcionario_nome);
	}
}
?>

