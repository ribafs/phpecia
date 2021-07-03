<?php

// Observe que nomes de classes são com CamelCase
// Nomes de propriedades e métodos com camelCase
class Login{

    // Geralmente as propriedades devem ser private
    // Criar private e usar método getters e setters public para manipular o valor das propriedades private
    private $email;
    private $senha;

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($e){
        $email = filter_var($e, FILTER_SANITIZE_EMAIL);
        $this->email = $email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($s){
        $this->senha = $s;
    }

    // Diferença entre getter e setter:
    // getter apenas retorna a propriedade: return $email
    // setter recebe um valor e atribui este valor para a propriedade
    // Uma das utilidades de se utilizar setters é que podemos filtrar o valor antes de mostrar ou de armazenar no banco

    public function logar(){
        if($this->email == 'teste@teste.com' && $this->senha == '123456'){
            echo 'Logado com sucesso<br>';
        }else{
            echo 'Dados inválidos';
        }
    }

}

$login = new Login();
$login->setEmail('teste@teste.com');
$login->setSenha('123456');
$login->logar();
echo $login->getEmail();
echo '<br>';
echo $login->getSenha();
