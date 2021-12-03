<?php
/*
No PHP5 para trabalhar com herança devemos usar a palavra-chave "extends" na definição da classe
No PHP5 apenas herança simples é permitida.
*/
class Pessoa {
	private $nome;
	private $endereco;
 
	public function getnome() {
		return $this->nome;
	}
}
 
class Cliente extends Pessoa {
	private $Cliente_id;
	private $record_date;
 
	public getClienteId() {
		return $this->Cliente_id;
	}
 
	public getClientenome() {
		return $this->getnome();// getnome() is in Pessoa
	}
}

/* No exemplo acima Cliente herda de Pessoa, o que significa que a classe Cliente é a classe filha e Pessoa é a classe pai.

Cliente extende o método getnome() da classe pai e chama este no método  getClientenome() da classe Custom;
*/


