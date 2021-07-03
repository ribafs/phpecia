<?php
/*
O método destrutor será chamado assim que todas as referências a um objeto particular forem removidas ou quando o objeto for explicitamente destruído ou qualquer ordem na sequência de encerramento. 
Como os construtores, destrutores pais não serão chamados implicitamente pelo engine. Para executar o destrutor pai, deve-se fazer uma chamada explicitamente a parent::__destruct() no corpo do destrutor. 

No PHP chamar o destrutor é desnecessário, tendo em vista que ao fechar o script/programa ele encerra todas as referências aos objetos.
*/

class MinhaClasseDestruivel {
   function __construct() {
       print "No construtor<br>";
       $this->name = "MinhaClasseDestruivel";
   }

   function __destruct() {
       print "Destruindo " . $this->name . "<br>";
   }
}

$obj = new MinhaClasseDestruivel();
?>

