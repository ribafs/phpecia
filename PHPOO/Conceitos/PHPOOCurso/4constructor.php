<?php
// https://www.youtube.com/watch?v=0D4sw2m1BZY&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=4
// O código no construtor é executado automaticamente sempre que instanciamos a classe, sempre que criamos um objeto
class Login{

    // Geralmente as propriedades devem ser private
    // Criar private e usar método getters e setters public para manipular o valor das propriedades private
    private $email;
    private $senha;
    private $nome;

    public function __construct($email, $senha, $nome){// Ao usar siga a ordem
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n){
        $this->nome = $n;
    }

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

$login = new Login('teste@teste.com','123456','Rodrigo');
$login->logar();
echo $login->getEmail();
echo '<br>';
echo $login->getSenha();
echo '<br>';
echo $login->getNome();
// Todo arquivo php, com somente código php deve terminar com uma linha em branco

/*
Num construtor assim:
public function __construct() {
    echo 'Criou um objeto';
}

Apenas inicializar já vai mostrar a mensagem. Veja:

$p1 = Pessoa();
var_dump($p1);

A mensagem aparece no início da saída do var_dump()
*/

