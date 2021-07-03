<?php

class Cat {
	function miau()
	{
		print "miau";
	}
}

class Dog {
	function latir()
	{
		print "latir";
	}
}

function printTheRightSound($obj)
{
	if ($obj instanceof Cat) {
		$obj->miau();
	} else if ($obj instanceof Dog) {
		$obj->latir();
	} else {
		print "Error: Passed wrong kind of object";
	}
print "<br>";
}

printTheRightSound(new Cat())."<br>";
printTheRightSound(new Dog());

/* Este exemplo não é extensível, pois se adicionarmos sons de mais animais precisaremos estar repetindo código: else if. */

?>
