<?php

// Observe que nomes de classes são com CamelCase
// Nomes de propriedades e métodos com camelCase
// Setters - indicados para validação
// Getters - indicados para formatação
class Login{

    public $email;
    public $senha;

    public function logar(){
        if($this->email == 'teste@teste.com' && $this->senha == '123456'){
            echo 'Logado com sucesso';
        }else{
            echo 'Dados inválidos';
        }
    }

}

$login = new Login();
$login->email = 'teste@teste.com';
$login->senha = '123456';
$login->logar();
