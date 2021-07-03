# PHP Estruturado

A Orientação a Objetos é uma forma de escrever o código, mas pra valer, o código PHP é formado pela sua sintaxe, suas estruturas de controle de fluxo e pelas diversas funções nativas existentes, assim como das criadas pelo usuário/programador.

Arquivos em php:
- Precisam geralmente terminar na extensão .php
- Precisam ser criados no diretório web (Exs: /var/www/html ou c:\xampp\htdocs)
- Todo o seu código precisam estar entre as tags <?php e ?>. Quando for exclusivamente com código php, não deve ter a tag ?>

Veja que variáveis em PHP não declaram tipos. Os tipos são tratados apenas em tempo de execução.

Tipos de dados: 
```php
string, 
inteiro, // -2,147,483,648 e 2,147,483,647
float, 
boolean, 
array, //$cars = array("Volvo","BMW","Toyota"); ou $cars = ["Volvo","BMW","Toyota"]; // A partir da versão 5.4
object, 
null, 
resource

$idade = 63;
$str = 'Ribamar FS';
$str2 = "Ribamar FS tem idade: $idade";// Ribamar FS tem idade: 63;
$str3 = 'Ribamar FS tem idade: $idade'; //Ribamar FS tem idade: $idade (não processa as strings)
$int = 23;
$flo = 34.5;
$bol = true;

echo $int;

Na versão 7 temos como forçar a declaração de tipos para tipos de função e retorno. Declarando no início de cada arquivo:
declare(strict_types = 1);

Escopo local e global

 <?php
$x = 5; // Escopo global

function teste() {
    // using x inside this function will generate an error
    echo "<p>Variable x inside function is: $x</p>";
}

print $x; // Imprimirá
teste();// Acusará erro, pois $x foi declarada no escopo global (fora da função) e não é visível dentro da função

function myTest() {
    $x = 5; // local scope
    echo "<p>Variable x inside function is: $x</p>";
}
myTest();// Funciona

$y = 15; // Escopo global

function teste2() {
    global $x, $y;
    $y = $x + $y;
}

teste2();// Funciona
echo $y; // outputs 15

Objetos

class Car {
    function Car() {
        $this->model = "VW";
    }
}

// create an object
$herbie = new Car();

// show object properties
echo $herbie->model;
```

Constantes

Uma variável pode ter seu valor alterado em qualquer parte do código.
Uma constante não pode ter seu valor alterado durante a execução do código

```php
define("GREETING", "Welcome to W3Schools.com!");
echo GREETING;

Obs.: Criar variáveis sempre com maiúsculas é uma boa convenção


Operadores:

Soma - (+)
Subtração - (-)
Multiplicação - (*)
Divisão - (/)
Módulo - (%) // Resto da divisão de 2 números
Atribuição
x = y
x +=y
x -=y
x *=y
x /=y
x %=y
Igual ==
Idêntico === 
Diferente !=
Diferente <>
Não idêntico !==
>
<
>=
<=
<=>

Incrementais
++$x // pré-incremento
$x++ // pós-incremento
--$x
$x--
and ou && (prefira &&)
or ou || (prefira ||)

Operador ternário - ?
Null coalescing - ??
```

https://www.w3schools.com/php/php_operators.asp
https://www.php.net/manual/pt_BR/language.operators.php

