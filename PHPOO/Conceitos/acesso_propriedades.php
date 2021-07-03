<?php
class pessoa {
	private $nome;
	public $altura;
	protected $posicao_social;
	private $cpf;

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

</head>
<body>

<?php
	$pedro = new pessoa("Pedro Mesquita");
	echo "Nome completo do Pedro: " . $pedro->get_nome();

	/* Como $cpf foi declarado private, a linha abaixo deverá gerar um erro.
	Descomente para testar!
	*/
	//echo "Diga-me algo particular: " . $pedro->cpf;
?>

</body>
</html>

