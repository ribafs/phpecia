<?php
echo "Seu processador é: " . $_POST["processador"] . "<BR>";

// Verifica se usuário escolheu algum livro
if(isset($_POST["livros"]))
{
    echo "O(s) livro(s) que você deseja comprar:<br>";
    // Faz loop para os livros
    foreach($_POST["livros"] as $livro)
    {
        echo "- " . $livro . "<br>";
    }
}
else
{
    echo "Você não escolheu nenhum livro!";
}
?>
