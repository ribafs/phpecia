<?php
// Exemplos de funções definidas pelo usuário
function quadrado($numero) {
	print $numero*$numero;
}

//Executando:
quadrado(6); // Saída: 36

// Variáveis globais
$var1 = 5;
function testeGlobal1(){
        $var1 = 1;
        print "<br>Valor de \$var1: $var1";
}
echo testeGlobal1();
//Variável externa acessível na função

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

function aumentoSalario($sal, $perc=5){
        $salario = $sal * $perc/100;
        echo $salario;
}
echo "<br>Aumento: " . aumentoSalario(1956);

function redirecionar($url){
        header("Location: $url");
}
echo "<br>";
redirecionar("http://127.0.0.1/phpcursos/");
echo "<br>";
// Com acesso a bancos de dados
function autenticar($Campo1Frm, $Campo2Frm, $Campo1Tb, $Campo2Tb, $Tabela, $urlAcesso){
        // Irá testar se o usuario de um form anterior (POST) pertence a 
        // uma tabela. O Campo deve ser chave primária da tabela
        // Caso pertença será redirecionado para a $url, 
        // caso contrário voltará para a anterior
        $Campo1Frm=$_POST[$Campo1Frm];
        $Campo2Frm=$_POST[$Campo2Frm];

        $strConsulta = "SELECT * FROM $Tabela WHERE $Campo1Tb='$Campo1Frm' 
						AND $Campo2Tb='$Campo2Frm'";
        $resultado = pg_query($strConsulta) or die("A consulta falhou:<br> " . pg_last_error());
        
        $numregs = pg_numrows($resultado);
        // Como o campo é chave primária, somente devemos encontrar um único registro que atenda
   if ($numregs == 1){
        header("Location:$urlAcesso");
   } else {
      ?><script>
        alert('Dados não conferem. Verifique se não cometeu erros!');
        history.back();
        //Para frente é: history.forward(); 
      </script>    
      <?
      pg_close();         // Os @ escondem as mensagens de erro originais 
   }
}

// Chamando
//autenticar($Campo1Frm, $Campo2Frm, $Campo1Tb, $Campo2Tb, $Tabela, $urlAcesso);
?>

<?php declare(strict_types=1); // strict requirement ?>

<?php
function setAltura(int $minAltura = 50) {
    echo "The height is : $minAltura <br>";
}

setAltura(350);
setAltura();

<?php declare(strict_types=1); // strict requirement ?>

<?php
function sum(int $x, int $y) {
    $z = $x + $y;
    return $z;
}

echo "5 + 10 = " . sum(5,10) . "<br>";
echo "7 + 13 = " . sum(7,13) . "<br>";


