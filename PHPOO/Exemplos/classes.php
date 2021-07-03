<?php

// Tradicional classe inicial - olaMundo
class OlaMundo {
	function OlaMundo(){	
		return "Olá Mundo do PHPOO!";
	}
}

$ola = new OlaMundo();
print $ola->OlaMundo();

// Classe Pessoa
class Pessoa {
	private $nome;
	function setNome($nome){
		$this->nome = $nome;
	}

	function getNome(){
		return $this->nome;
	}
}

$joao = new Pessoa();
$joao->setNome("João Brito");
$pedro = new Pessoa();
$pedro->setNome("Pedro Ribeiro");

print '<b><br><br>Classe Pessoa:<br></b>';
print $joao->getNome();
print '<br>';
print $pedro->getNome();

class Construtor {
   function __construct() {
       print "No construtor da Classe";
   }
}

print '<b><br><br>Classe Construtor:<br></b>';
$obj = new Construtor();
print $obj->Construtor;

// Controle de acessos
class Acessos{
	public $variavelPublic = "Variável Pública<br>";
	protected $variavelProtected = "Variável Protegida<br>";
	private $variavelPrivate = "Variável Privada<br>";
	
	public function getPublic(){
		return $this->variavelPublic; 		 			
	}

	public function getProtected(){
		return $this->variavelProtected; 		 			
	}
	
	public function getPrivate(){
		return $this->variavelPrivate; 		 			
	}
	
	public function getMetodoPrivate(){
		return Acessos::getPrivate(); 		 			
	}	
	
}  

$especificacaoAcesso = new Acessos();
echo $especificacaoAcesso->getPublic();
echo $especificacaoAcesso->getMetodoPrivate(); 
//echo $especificaAcesso->getPrivate(); // Dará um erro fatal

// Variáveis e Métodos Static, onde podemos usar sem instanciar a classe

class Estatica{ 
	static $varStatic = "Variável Estática<br>"; 

	static function getStatic(){
		return Estatica::$varStatic;
	} 
} 

// Ou chamando a variável diretamente "Estatica::$varStatic". 
echo Estatica::getStatic();

// Métodos Final
class ClasseFinal{	
	final function getFinal(){
		echo "Método Final"; 
	} 
} 

$classeFinal = new ClasseFinal(); 
$classeFinal->getFinal();

// Método Construtor e Destrutor
class ContrutorDestrutor{ 

	private $varMethod; 
	function __construct(){ 
		$this->varMethod = "Construtor()"; 
		echo "Método {$this->varMethod}<br>"; 
	} 

	function __destruct(){ 
		$this->varMethod = "Destrutor()"; 
		echo "Método {$this->varMethod}<br>"; 
	} 
} 

$contrutorDestrutor = new ContrutorDestrutor(); 
unset($contrutorDestrutor); 

class ContrutorDestrutorFilho extends ContrutorDestrutor{ 
	function __construct(){ 
		parent::__construct(); 
		echo "Método Filho Construtor<br>"; 
	} 

	function __destruct(){ 
		parent::__destruct(); 
		echo "Método Filho Destrutor<br>"; 
	} 
} 

echo "<br>"; 
$contrutorDestrutorFilho = new ContrutorDestrutorFilho(); 

// Constantes da Classe
class Constante{ 
	const constante = "Minha Constante"; 
} 
echo Constante::constante; 

// Clonando Objetos
class ClasseClonando{ 
    public $varClone; 
    function __construct(){ 
        $this->varClone = "<br>Php5<br>"; 
    } 

    function __clone(){ 
        $this->varClone = "Php5 Clone<br>"; 
    } 
} 

$classeClonando = new ClasseClonando(); 
$cloneClasseClonando = clone $classeClonando; 
echo $classeClonando->varClone . "<br>" . $cloneClasseClonando->varClone;

// InstanceOf (Testar se classe é instância de outra)
class TesteInstanceOf 
{ 
//....
} 

class ClasseInstanceOf{ 
    function __construct($obj){ 
        if ($obj instanceof TesteInstanceOf) { 
            echo "Objeto da classe(TesteInstanceOf)<br>"; 
        } else { 
            echo "Não é um objeto da classe(TesteInstanceOf)<br>"; 
        } 
    } 
} 

$testeInstanceOf = new TesteInstanceOf(); 
$classeInstanceOf = new ClasseInstanceOf($testeInstanceOf); 

//Classes Abstratas
abstract class Abstrata{ 
    public abstract function setNome($nome); 
    public abstract function getNome(); 
} 

class ClasseAbstrata extends Abstrata{ 
    private $nome; 
    public function setNome($newNome){ 
        $this->nome = $newNome; 
    } 

    public function getNome(){ 
        return $this->nome; 
    } 
} 

$classeAbstrata = new ClasseAbstrata(); 
$classeAbstrata->setNome("Php5"); 
echo $classeAbstrata->getNome()."<br>"; 

// Interfaces
interface IPessoa{ 
    public function setNome($nome); 
    public function getNome(); 
} 

interface IPessoaFisica{ 
    public function setCpf($cpf); 
    public function getCpf(); 
} 

interface IPessoaJuridica{ 
    public function setCnpj($cnpj); 
    public function getCnpj(); 
} 

class ClassePessoa implements IPessoa, IPessoaFisica, IPessoaJuridica{ 
    function __construct($nome, $cpf, $cnpj){ 
        ClassePessoa::setNome($nome); 
        ClassePessoa::setCpf($cpf); 
        ClassePessoa::setCnpj($cnpj); 
    } 

    /* Métodos Set */ 
    public function setNome($nome){ 
        $this->nome = $nome; 
    } 
    public function setCpf($cpf){ 
        $this->cpf = $cpf; 
    }
    public function setCnpj($cnpj){ 
        $this->cnpj = $cnpj; 
    } 
    /* Métodos Get */ 
    public function getNome(){ 
        return $this->nome; 
    } 
    public function getCpf(){ 
        return $this->cpf; 
    } 
    public function getCnpj(){ 
        return $this->cnpj; 
    } 
    function __destruct(){ 
        echo ClassePessoa::getNome()."<br>".ClassePessoa::getCpf()."<br>".ClassePessoa::getCnpj(); 
    } 
} 

$classePessoa = new ClassePessoa("Rodrigo", "324.541.588-98", "6545.2101/0001"); 

// Tratamento de erros lógicos - Exceptions
class BusinessException extends Exception{ 
    function __construct($msg){ 
        // Vai para a função construtora do Exception. 
        parent::__construct($msg); 
    } 
} 

class Excecao{ 
    function __construct($nome){ 
        try { 
            if ($nome == "") { 
                throw new BusinessException("Nome não pode ser em branco"); 
            } elseif(strlen($nome) < 5) { 
                throw new BusinessException("Nome precisa ter no mínimo 5 letras"); 
            } elseif(strtolower($nome) == "corinthians") { 
                throw new BusinessException("Corinthians campeão"); 
            } else { 
                throw new BusinessException("Paramêtro inválido"); 
            } 
        } catch (BusinessException $businessException) { 
            echo $businessException->getMessage(); 
        } 
    } 
} 

$excecao = new Excecao("Corinthians"); 

// Singleton
class Singleton { 
    private static $instance = null; 

    public static function getInstance(){ 
        if (Singleton::$instance == null) { 
            Singleton::$instance = new Singleton(); 
        } 
        return Singleton::$instance; 
    } 
} 

$objA = Singleton::getInstance(); 
$objB = Singleton::getInstance(); 
if ($objA == $objB) { 
    echo "<br>Instância única"; 
} else { 
    echo "<br>Instâncias diferentes"; 
} 

// Pattern Factory
abstract class AbstractFactory 
{ 
    private $nome; 
    private $rendaMensal; 

    function __construct($nome, $rendaMensal){ 
        $this->setNome($nome); 
        $this->setRendaMensal($rendaMensal); 
    } 

    public function setNome($newNome){ 
        $this->nome = $newNome; 
    } 

    public function setRendaMensal($newRendaMensal){ 
        $this->rendaMensal = $newRendaMensal; 
    } 

    public function getNome(){ 
        return $this->nome; 
    } 

    public function getRendaMensal(){ 
        return $this->rendaMensal; 
    } 

    public abstract function analisarCredito(); // Boolean 
    public abstract function getCategoria(); // String 
} 

class ClientePadrao extends AbstractFactory{ 
    function __construct($nome, $rendaMensal){ 
        parent::__construct($nome, $rendaMensal); 
    } 

    // Foi declarada no AbstractFactory 
    public function analisarCredito(){ 
        return true; 
    } 

    // Foi declarada no AbstractFactory
    public function getCategoria(){ 
        return "Cliente Padrão"; 
    } 
} 

class ClienteRisco extends AbstractFactory{ 
    function __construct($nome, $rendaMensal){ 
        parent::__construct($nome, $rendaMensal); 
    } 

    // Foi declarada no AbstractFactory 
    public function analisarCredito(){ 
        return false; 
    } 

    // Foi declarada no AbstractFactory 
    public function getCategoria(){ 
        return "Cliente Risco"; 
    } 
} 

class ClienteSeguro extends AbstractFactory{ 
    function __construct($nome, $rendaMensal){ 
        parent::__construct($nome, $rendaMensal); 
    } 

    // Foi declarada no AbstractFactory 
    public function analisarCredito(){ 
        return true; 
    } 

    // Foi declarada no AbstractFactory 
    public function getCategoria(){ 
        return "Cliente com alta credibilidade"; 
    } 
} 

class SingletonFactory{ 
    private static $rendaMedia = 500; 
    private static $rendaBaixa = 240; 
    private static $instance = null; 

    public static function getCliente($nome, $rendaMensal){ 
        if ($rendaMensal <= SingletonFactory::$rendaBaixa) { 
            SingletonFactory::$instance = new ClienteRisco($nome, $rendaMensal); 
        } elseif ($rendaMensal > SingletonFactory::$rendaBaixa and 
				$rendaMensal <= SingletonFactory::$rendaMedia) { 
            SingletonFactory::$instance = new ClientePadrao($nome, $rendaMensal); 
        } else { 
            SingletonFactory::$instance = new ClienteSeguro($nome, $rendaMensal); 
        } 

        $clienteAprovacao = "reprovado"; 
        if (SingletonFactory::$instance->analisarCredito()) { 
            $clienteAprovacao = "aprovado"; 
        } 

        echo "<br>Cliente = ".SingletonFactory::$instance->getNome()."<br>"; 
        echo "Categoria = ".SingletonFactory::$instance->getCategoria()."<br>"; 
        echo "Crédito = ".$clienteAprovacao; 
        echo "<hr>"; 
    } 
} 

SingletonFactory::getCliente("Rodrigo", 1977); 
SingletonFactory::getCliente("Corinthians", 350); 
SingletonFactory::getCliente("John", 220); 

// Listando os métodos de um Objeto

class OlaMundo2 {
   // constructor
   function OlaMundo2(){
       return(true);
   }
   // method 1
   function funcao1(){
       return(true);
   }

   // method 2
   function funcao2(){
       return(true);
   }
}

$meus_objetos = new OlaMundo2();
$metodos_classe = get_class_methods(get_class($meus_objetos));

foreach ($metodos_classe as $nome_metodo) {
   echo "$nome_metodo<br>";
}

// Listando as variáveis de uma classe

class Variaveis {

   var $variavel1; // esta não tem valor default...
   var $variavel2 = "xyz";
   var $variavel3 = 100;

   // construtor
   function Variaveis() {
       // mudar algumas propriedades
         $this->var1 = "foo";
         $this->var2 = "bar";
         return true;
   }

}

$minha_classe = new Variaveis();
$variaveis = get_class_vars(get_class($minha_classe));

foreach ($variaveis as $nome => $value) {
   echo "$nome = $value<br>";
}

// Listar variáveis de um objeto

class Point2D {
   var $x, $y;
   var $label;

   function Point2D($x, $y){
       $this->x = $x;
       $this->y = $y;
   }

   function setLabel($label){
       $this->label = $label;
   }

   function getPoint(){
       return array("x" => $this->x,
                     "y" => $this->y,
                     "label" => $this->label);
   }
}

// "$label" is declared but not defined
$p1 = new Point2D(1.233, 3.445);
print_r(get_object_vars($p1));

$p1->setLabel("point #1");
print_r(get_object_vars($p1));

// Testando existência de classe e subclasse
class Foo { var $myVar; }

class Foo_Bar extends Foo { var $myVar2;}

echo class_exists('Foo')."<br>"; //true
echo class_exists('foo')."<br>"; //true
echo class_exists('Foo_Bar')."<br>"; // true
echo get_parent_class('Foo_Bar')."<br>"; // foo (NOTE: NOT Foo!)

// Devolver nome da classe pai para objeto ou classe
class dad {
   function dad(){
   // implemente alguma lógica
   }
}

class child extends dad {
   function child(){
       echo "Eu sou a classe <b>" , get_parent_class($this) , "'s </b>filho<br>";
   }
}

class child2 extends dad {
   function child2(){
       echo "Eu também sou a classe <b>" , get_parent_class('child2') , "'s </b>filho<br>";
   }
}

$foo = new child();
$bar = new child2();

// Checar se método da classe existe
class Foo1 {
  public function bar() {
   echo "Eu sou private Foo1::bar()<br>";
  }
}

class Foo2 {
  private function bar() {
   echo "Eu sou public Foo2::bar()<br>";
  }
}

$f1=new Foo1;
$f2=new Foo2;

if(is_callable(array($f1,"bar"))) {
   echo "Foo1::bar() é acessível<br>";
} else {
   echo "Foo1::bar() não é acessível<br>";
}
if(is_callable(array($f2,"bar"))) {
   echo "Foo2::bar() é acessível<br>";
} else {
   echo "Foo2::bar() não é acessível<br>";
}
if(in_array("bar",get_class_methods($f1))) {
   echo "Foo1::bar() é acessível<br>";
} else {
   echo "Foo1::bar() não é acessível<br>";
}
if(in_array("bar",get_class_methods($f2))) {
   echo "Foo2::bar() é acessível<br>";
} else {
   echo "Foo2::bar() não é acessível<br>";
}

?>
