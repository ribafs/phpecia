<?php
//class.factorial.php
class factorial
{
	private $result = 1;// you can initialize directly outside
	private $number;

	function __construct($number)
	{
		$this->number = $number;
		for($i=2; $i<=$number; $i++)
		{
			$this->result *= $i;
		}
	}
	public function showResult()
	{
		echo "Fatorial de {$this->number} é {$this->result}. ";
	}
}

$f = new factorial(5);
print $f->showResult();
?>
