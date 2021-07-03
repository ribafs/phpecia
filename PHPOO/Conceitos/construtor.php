<?php
/*
Construtores são métodos que são automaticamente chamados sempre que uma classe é instanciada.
*/
class pessoa {
	private $nome; // var ainda é mantido para compatibilizar, mas devemos evitar seu uso

	function __construct($pessoa_nome) {
		$this->nome = $pessoa_nome;
	}

	function set_nome($novo_nome) {
		$this->nome = $novo_nome;
	}

	function get_nome() {
		return $this->nome;
	}
}
?>

<?php
class ClasseBase {
   function __construct() {
       print "No construtor da ClasseBase<br>";
   }
}

class SubClasse extends ClasseBase {
   function __construct() {
       parent::__construct();// Chamar o construtor da classe pai (ClasseBase)
       print "No construtor da SubClasse<br>";
   }
}

$obj = new ClasseBase();
$obj = new SubClasse();
?>

