# Tratamento de Erros Inteligente

Tratamento de error exige conhecimento, ferramentas e técnicas apropriadas.
Tratar erros geralmente é algo que exige vários anos de experiência.

Geralmente criar software não é algo trabalhoso, especialmente se temos uma receitinha, mas debugar um software isso sim exige do programador. Quanto mais experiência menos será a dificuldade encontrada para debugar código. Quando já passamos por uma certa situação geralmente na próxima vez já sabemos o que fazer.

## Configurações

O PHP por default vem escondendo as mensagens de erro.

Edite o php.ini e altere para On

display_errors = On

Então reinicie o Apache

## Ambientes de testes e de produção

define('DEBUG', true);

Nos servidores de hospedagem compartilhada geralmente não temos acesso direto ao php.ini, então devemos usar
```php
ini_set() e error_reporting().

// Ambiente de Testes
if(DEBUG) { 
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
} else {
// Ambiente de Produção
  error_reporting(0);
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  ini_set('error_log', ROOT . DS .'tmp' . DS . 'logs' . DS . 'errors.log');
}
```
## Xdebug
Uma boa ferramenta de debug para o PHP. Instalar em seu sistema operacional.

Veja abaixo mais duas boas ferramentas para debugar erros no PHP e escolha a que você mais se adapta.

## Tracy

É uma boa alternativa.

use Tracy\Debugger;

Debugger::enable();

Debugger::$showBar = true;

$os->teste();


## Whoops

É uma boa alternativa.
```php
$whoops = new \Whoops\Run;

$errorPage = new Whoops\Handler\PrettyPageHandler();
 
$errorPage->setPageTitle("Also wrong here!"); // Set the page's title
$errorPage->setEditor("sublime");         // Set the editor used for the "Open" link
// Algumas informações extras
$errorPage->addDataTable("Extra Informations", array(
      "stuff"     => 123,
      "foo"       => "bar",
      "useful_id" => "baloney"
));
} else {
    $whoops->pushHandler(function($e){
        echo 'Todo: Friendly error page and send an email to the developer';
    });
}
 
$whoops->pushHandler($errorPage);
$whoops->register();
```

## Dicas

Quando precisamos chamar um campo vindo de um form e o submit ainda não aconteceu, usamos o operador ternário assim:

$table = isset($_POST['table'])?$_POST['table']:null;


