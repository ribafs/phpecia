<?php
// Praticamente é sem limite a quantidade de classes que extendem outra
class Primeira
{
	public function indexPri(){
			return 'Index primeira';
	}
}

class Segunda extends Primeira
{
	public function indexSeg(){
			return 'Index segunda';
	}
}

class Terceira extends Segunda
{
	public function indexTer(){
			return 'Index terceira';
	}
}

class Quarta extends Terceira
{
	public function indexQua(){
			return 'Index quarta';
	}
}

class Quinta extends Quarta
{
	public function indexQui(){
			return 'Index quinta';
	}
}

class Sexta extends Quinta
{
	public function indexSex(){
			return 'Index sexta';
	}
}

$sex = new Sexta();
print $sex->indexPri();
print '<br>';
print $sex->indexSeg();
print '<br>';
print $sex->indexTer();
print '<br>';
print $sex->indexQua();
print '<br>';
print $sex->indexQui();
print '<br>';
print $sex->indexSex();
