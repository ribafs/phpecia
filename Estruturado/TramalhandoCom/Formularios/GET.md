Variável $_GET
O que é?

A variável $_GET é usada para obter dados de um formulário escrito em HTML. Também no url, a variável $_GET exibirá os dados que foram obtidos pela variável $_GET. Por exemplo, usando o segundo exemplo nesta página, ele será exibido na url como? Name = 'será igual ao texto inserido na caixa de texto'. $_GET tem limites na quantidade de informações que podem ser enviadas.
Como usá-lo

Antes de usar a variável $_GET, você deve ter um formulário em html que tenha o método igual a GET. Então, no php, você pode usar a variável $_GET para obter os dados que deseja. A sintaxe $_GET é ($_GET ['nome do campo do formulário vai aqui']).

<?php
// It will display the data that it was received from the form called name
 	 echo ($_GET['name']);
 ?>
 
 //This is the html form that creates the input box and submit button
 //The method for the form is in the line below
 <form action="name of the php file that has the ($_GET[]) variable in it" method="GET">
 	Name:<input type="text" name="name">

 	<input type="submit" value="Submit">
 </form>


