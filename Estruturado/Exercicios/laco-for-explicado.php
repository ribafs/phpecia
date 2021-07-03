//EXPLICANDO EM DETALHES O PROCESSAMENTO DO LAÇO ABAIXO


// Variáveis
$fat = 5;
$resul = 1;

// Laço
for ($i = $fat ; $i>1; $i--){
$resul*=$fat;
$fat--;
}
// Resultado
echo ".$resul.";

Veja como funciona

Na primeira vez

for ($i = 5 ; $i>1; $i--){ // Como $i>1, então reduz $i para 4 ($i-- => $i = $i -1, ou seja, $i = 5-1, $i = 4)
$resul = $result * 5; // $result = 1*5 = 5
$fat = $fat -1; // $fat = 5-1 = 4
}

Segunda iteração

for ($i = 4 ; $i>1; $i--){ // Como $i = 4, então $i>1, então reduz $i para 3
$resul = 5 * 4; // $result = 20
$fat = $fat - 1; // $fat = 4-1 = 3
}

Terceira iteração

for ($i = 3 ; $i>1; $i--){ // Como $i>1, então reduz $i para 2
$resul = 20 * 3; // $result = 60
$fat = $fat - 1; // $fat = 3-1 = 2
}

Quarta iteração

for ($i = 2 ; $i>1; $i--){ // Como $i>1, então reduz $i para 1
$resul = 60 * 2; // $result = 120
$fat = $fat - 1; // $fat = 2-1 = 1
}

Quinta iteração

for ($i = 1 ; $i>1; $i--){ // Como $i==1, não entra mais no for, parou aqui. Agora iimprime .$result.
    //
}

.120.

O processamento começa lendo as variáveis, que terão seus valores alterados durante o processamento

Depois vai para o alço for e fica preso até que as condições do laço não mais aceitem que continue entrando nele.

Quando não mais entra no laço mostra o resultado ao final.

https://gist.github.com/ribafs/2266f855b133a52cf6db4b0dbe11e3ee
