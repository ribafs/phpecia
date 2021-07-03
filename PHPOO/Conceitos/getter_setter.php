<?php
// https://www.youtube.com/watch?v=QaM22Qgo3gM&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=3
class pessoa {
	// propriedade
	private $nome;

	// método setter
	function set_nome($novo_nome) {
		$this->nome = $novo_nome;
	}

	// método getter
	function get_nome() {
		return $this->nome;
	}
}

$p = new pessoa;
$p->set_nome('Ribamar');
print $p->get_nome();
?>
