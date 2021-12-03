<?php
/*
Quando você extende uma classe, a sub-classe herda todos os métodos public e protected da classe pai.
Enquanto a sub-classe não sobrescrever estes métodos eles devem manter suas funcionalidades originais.
*/
class pessoa {
	// explicitly adding class properties are optional - but is good practice
	var $nome;

	function __construct($pessoa_nome) {
		$this->nome = $pessoa_nome;
	}

	public function get_nome() {
		return $this->nome;
	}

	//protected methods and properties restrict access to those elements.
	protected function set_nome($novo_nome) {
		if ($nome != "João Brito") {
			$this->nome = strtoupper($novo_nome);
		}
	}
}

// 'extends' is the keyword that enables inheritance
class funcionario extends pessoa {
	protected function set_nome($novo_nome) {
		if ($novo_nome == "João Alfredo") {
			$this->nome = $novo_nome;
		}
		else if($novo_nome == "Carlos Cunha") {
			pessoa::set_nome($novo_nome);
		}
	}

	function __construct($funcionario_nome) {
		$this->set_nome($funcionario_nome);
	}
}
?>


