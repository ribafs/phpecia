<?php
// https://www.youtube.com/watch?v=Ikc4QeyixIg&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=15
// Tratamento de exceções: Exception é a classe principal

class NewsLetter{
    public function cadastrarEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            // Lançar a exceção
            throw new Exception('E-mail inválido', 1);
        }else{
            echo 'E-mail cadastrado com sucesso';
        }
    }
}

$nl = new NewsLetter();

// Tratar a exceção, se existir
try {
    $nl->cadastrarEmail('contato@');
} catch (Exception $e){
    echo 'Mensagem: '.$e->getMessage().'<br>';
    echo 'Código: '.$e->getCode().'<br>';
    echo 'Linha: '.$e->getLine().'<br>';
    echo 'Arquivo: '.$e->getFile().'<br>';
}

// Em desenvolvimento é útil usar este código   
