<?php
// https://www.youtube.com/watch?v=i-UNzXTu-9w&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=10
// Métodos e propriedades estáticas - para acessá-los não precisa instanciar a classe, apenas referir com NomeClasse::metodo_prop

class Login{
    public static $user;

    public static function checarLogin(){
        //echo 'Usuário '.$this->user.' está logado';// Acusará erro. Não podemos usar $this com propriedades ou métodos estáticos
        echo 'Usuário '.self::$user.' está logado';
    }

    // Podemos ter também métodos não estáticos e que requerem instanciar a classe
    public function sair(){
        echo 'Usuário saiu';
    }
    
}
Login::$user="joao";
//echo Login::$user;
Login::checarLogin();
print '<br>';
$login = new Login();
$login->sair();
