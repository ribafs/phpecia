<?php
echo 'isto é uma string comum<br>';

echo 'Você pode incluir novas linhas em strings,
dessa maneira que estará
tudo bem<br>';

// Imprime: Arnold disse uma vez: "I\'ll be back"
echo 'Arnold once said: "I\'ll be back"<br>';

// Imprime: Você tem certeza em apagar C:\*.*?
echo 'Você tem certeza em apagar C:\\*.*?<br>';

// Imprime: Você tem certeza em apagar C:\*.*?
echo 'Você tem certeza em apagar C:\*.*?<br>';

// Imprime: Isto não será substituido: \n uma nova linha
echo 'Isto não será substituido: <br> uma nova linha<br>';

// Imprime: Variaveis $também não $expandem
echo 'Variaveis $também não $expandem<br>';

echo '<br>------------<br>';

$str = <<<EOD
Exemplo de uma string
distribuída em várias linhas
utilizando a sintaxe heredoc.
EOD;

/* Exemplo mais complexo, com variáveis */
class foo
{
   var $foo;
   var $bar;

   function foo()
   {
       $this->foo = 'Foo';
       $this->bar = array('Bar1', 'Bar2', 'Bar3');
   }
}

$foo = new foo();
$name = 'Meu nome';

echo <<<EOT
Meu nome é "$name". Eu estou imprimindo $foo->foo.
Agora, eu estou imprimindo {$foo->bar[1]}.
Isto deve imprimir um 'A' maiúsculo: \x41
EOT;

?>
