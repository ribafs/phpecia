<?php
/*
Propriedades e métodos private não podem ser vistos nem alterados de fora da classe.
Para isso usamos os métodos getter e setter como abaixo.
*/
class Propriedades
{
	private $name;
	private $email;

	public function setName($name)
	{
		$this->name= $name;
	}

	public function setEmail($email)
	{
		$this->email =$email;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getEmail()
	{
		return $this->email;
	}
}

$p = new Propriedades();
$p->setName('Ribamar');
print $p->getName();
?>
