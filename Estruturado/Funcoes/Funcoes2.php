<?php

echo "<pre>
Funções são blocos de código, conjuntos de instruções, que ficam quietos,
sem vida, até que sejam chamadas em algum lugar do código.
Funções reduzem o trabalho de digitação, o tamanho dos scripts em geral,
os erros, reaproveitando código, facilitando e organizando o trabalho de
desenvolvimento.
</pre>";

echo "Exemplos de funções definidas pelo usuário<br>.";
function quadrado($numero) {
	print $numero*$numero;
}

//Executando:
quadrado(6); // Saída: 36

echo " Variáveis globais<br>";
$var1 = 5;
function testeGlobal1(){
        $var1 = 1;
        print "<br>Valor de \$var1: $var1";
}
echo testeGlobal1();

echo "Variável externa acessível na função<br>";

$var2 = 10;
function testeGlobal2(){
        global $var2;
        print "<br>Valor de \$var2 $var2";
}
echo testeGlobal2();

$var5 = 15;
function testeGlobal5(){
	$var5 = 5;
    print "<br><br>A variável global vale $GLOBALS[var5], ";
    print "Já a variável local vale $var5<br><br>";
}

testeGlobal5();

function cliente($codigo, $idade = 18){
	print "Código = $codigo, Idade = $idade";
}       

cliente(1);  //Exibirá: Código = 1, Idade = 18

function cubo($num){
        return ($num*$num*$num);
}

$var1 = 2 * cubo(5);echo "<br>".$var1;

echo "Variáveis estáticas<br>";
function contador(){
        static $x = 0;
        return $x++;
}
echo "<br>";
echo contador();echo contador();echo contador();
//A saída será: 012

function contador2(){
        $x = 0;
        return $x++;
}
echo "<br>";
echo contador2();echo contador2();echo contador2();
//A saída será: 000.

  function staticfunction() {
   static $count = 0;
   $count++;
	if ($count==1){
       echo "A Função foi executada $count vez<br>";
	}else{
	   echo "A Função foi executada $count vezes<br>";
	}
  }

  for($i = 0; $i < 5; $i++) {
   staticfunction();
  }

function Teste1()
{
    static $a = 0;
    echo $a;
    $a++;
}

for($x=0;$x<=10;$x++){
	echo Teste1()." ";
}

echo "<br>";

echo "Recursiva<br>";
function Teste()
{
    static $count = 0;

    $count++;
    echo $count." ";
    if ($count < 10) {
        Teste ();
    }
    $count--;
}

Teste();

echo "Declarando variáveis static<br>";
function foo(){
    static $int = 0;          // correro
   // static $int = 1+2;        // errado (é uma expressão)
   // static $int = sqrt(121);  // errado  (é uma expressão também)

    $int++;
    echo $int;
}


function aumentoSalario($sal, $perc=5){
        $salario = $sal * $perc/100;
        echo $salario;
}
echo "<br>Aumento: " . aumentoSalario(1956);

function redirecionar($url){
        header("Location: $url");
}
echo "<br>";
redirecionar("http://ribafs.phpnet.us/");
echo "<br>";

echo "Retornar mais de um valor de uma função: usa-se arrays e list()
array() retorna e list() exibe <br>";

//Exemplo:

function recebe_hoje(){
	$data_abreviada=date("d/m/Y");
	$data_extensa=date("l, d F \d\e Y");
	
	return array($data_abreviada, $data_extensa);
}

list($data_abreviada, $data_extensa)=recebe_hoje();
	print $data_extensa;
echo "<br>";
	print $data_abreviada;


echo "Declaração dinâmica de função:<br>";

if ($f == 1){
	function f1(){
		echo "funcao1";
	}
}else{
	function f2(){
		echo "funcao2";
	}
}

echo "Retornando o número de argumentos de uma função:<br>";

function ret_args_funcao() {
    $numargs = func_num_args();
    echo "Número de argumentos: $numargs<br>\n";
    if ($numargs >= 2) {
    echo "Segundo argumento vale : " . func_get_arg (1) . "<br>\n";
    }
    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {
    echo "Argumento $i vale: " . $arg_list[$i] . "<br>\n";
    }
} 

ret_args_funcao (1, 2, 3);

echo "<pre>
Passando Argumentos através de Funções

O default é 'por valor', que passa uma cópia do valor da variável.

Também podemos passar 'por referência', onde se passa o endereço da própria variável. Quando atribuímos uma variável a outra passando como referência, não fazemos cópia alguma, mas sim passamos o endereço da variável original, portanto qualquer alteração nesta referência refletirá na variável original.

ByRef é mais eficiente em termos de memória ao lidar com variáveis e arrays grandes e também permite alterar o valor da variável original, o que não acontece com o ByVal, mas a vantagem de desempnho somente é percebida em grandes arrays em grandes loops.

Para maior segurança setar:
allow_call_time_pass_reference no php.ini

Impede a passagem de valores por referência nas chamadas, mas permite somente na definição das funções.

$var1 = & $var2;
Agora ambas apontam para o mesmo endereço e valor.

Reter valor de variáveis entre chamadas (static)
(Guarda o valor da última chamada até o final da execução do script, tantas vezes quantas a função for chamada).
</pre>";


//Exemplo:

$valor = 4;
$ref = &$valor; 

$ref = 3;       

$valor = 4;
$ref = &$valor; // Aqui tornamos ambas as variáveis com o mesmo endereço
                // O que alterarmos em $ref alteramos em $valor
                        
$ref = 3;       // Com isso também alteramos $valor para 3, veja abaixo.
echo $valor . "<br>";

$valor=0;	   // Com isso também alteramos $ref para 0, veja abaixo.

echo $ref;


echo "Por Valor<br>";
function val_subtracao($num1, $num2){
        if($num1 < $num2){
                die("Números negativos");
        }else{
                $return_result=0;
                while($num1 > $num2){
                        $num1 = $num1 - 1;
                        $return_result = $return_result + 1;
                }
        }
        return($return_result);
}

$primeiro_op=493;
$segundo_op=355;
$resultado1 = val_subtracao($primeiro_op, $segundo_op);
print ("Resultado1 é $resultado1<br>");
$resultado2 = val_subtracao($primeiro_op, $segundo_op);
print("Resultado2 é $resultado2<br>");

echo "Por Referência<br>";
function subtracao_ref(&$num1, &$num2){
        if($num1 < $num2){
                die("Números negativos");
        }else{
                $return_result=0;
                while($num1 > $num2){
                        $num1 = $num1 - 1;
                        $return_result = $return_result + 1;
                }
        }
        return($return_result);
}

$primeiro_op=493;
$segundo_op=355;
$resultado1 = subtracao_ref($primeiro_op, $segundo_op);
print ("<br><br>Resultado1 é $resultado1<br>");
$resultado2 = subtracao_ref($primeiro_op, $segundo_op);
print("Resultado2 é $resultado2<br>");

echo "Agora, se se nós executarmos exatamente a mesma chamada da subtração como fizemos a primeira vez, receberemos a saída: resultado1 é 138 e resultado2 é 0";


/*
Sugestão de chamada de função:

if (nome_funcao($argumento){
	....
	....
}else{
	....
}

*/
?>

<?php
// Retorna o tipo e o valor de variável
function ss_as_string (&$thing, $column = 0) {
    if (is_object($thing)) {
        return ss_object_as_string($thing, $column);
    }
    elseif (is_array($thing)) {
        return ss_array_as_string($thing, $column);
    }
    elseif (is_double($thing)) {
        return "Double(".$thing.")";
    }
    elseif (is_long($thing)) {
        return "Long(".$thing.")";
    }
    elseif (is_string($thing)) {
        return "String(".$thing.")";
    }
    else {
        return "Unknown(".$thing.")";
    }
}

// Retorna o tipo e o valor de array
function ss_array_as_string (&$array, $column = 0) {
    $str = "Array(<BR>\n";
    while(list($var, $val) = each($array)){
        for ($i = 0; $i < $column+1; $i++){
            $str .= "&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        $str .= $var.' ==> ';
        $str .= ss_as_string($val, $column+1)."<BR>\n";
    }
    for ($i = 0; $i < $column; $i++){
        $str .= "&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    return $str.')';
}

// Retorna o tipo e o valor de objeto
function ss_object_as_string (&$object, $column = 0) {
    if (empty($object->classname)) {
        return "$object";
    }
    else {
        $str = $object->classname."(<BR>\n";
        while (list(,$var) = each($object->persistent_slots)) {
            for ($i = 0; $i < $column; $i++){
                $str .= "&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            global $$var;
            $str .= $var.' ==> ';
            $str .= ss_as_string($$var, column+1)."<BR>\n";
        }
        for ($i = 0; $i < $column; $i++){
            $str .= "&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        return $str.')';
    }
}

$var="Riba";
echo ss_as_string($var);
//echo ss_as_string($GLOBALS);


// Otimização do tempo de execução

function ss_timing_start ($name = 'default') {
    global $ss_timing_start_times;
    $ss_timing_start_times[$name] = explode(' ', microtime());
}

function ss_timing_stop ($name = 'default') {
    global $ss_timing_stop_times;
    $ss_timing_stop_times[$name] = explode(' ', microtime());
}

function ss_timing_current ($name = 'default') {
    global $ss_timing_start_times, $ss_timing_stop_times;
    if (!isset($ss_timing_start_times[$name])) {
        return 0;
    }
    if (!isset($ss_timing_stop_times[$name])) {
        $stop_time = explode(' ', microtime());
    }
    else {
        $stop_time = $ss_timing_stop_times[$name];
    }
    // do the big numbers first so the small ones aren't lost
    $current = $stop_time[1] - $ss_timing_start_times[$name][1];
    $current += $stop_time[0] - $ss_timing_start_times[$name][0];
    return $current;
}

?>
