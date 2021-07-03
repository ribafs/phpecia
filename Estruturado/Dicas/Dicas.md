# Dicas de PHP

## Inicialização de Variáveis
Uma ótima maneira de manter o seu site protegido de hackers é sempre inicializar suas variáveis para proteger o seu site de ataques XSS.

## Não fechar o php ao final do arquivo, caso esteja usando somente PHP no mesmo.
Fechar somente se estiver misturando HTML com PHP
É importante em termos de segurança

## Evite o uso de GET em métodos de forms

## Evitar o uso de includes ou requires. Ao invés usar: include_once ou require_once (prefira este, que para quando encontra um erro)

## Cheque se um diretório tem permissão de escrita antes de escrever nele:
```php
$contents = 'All the content';
$dir = '/var/www/project';
$file_path = $dir . '/content.txt';

if(is_writable($dir))
{
    file_put_contents($file_path , $contents);
}
else
{
    die('Directory $dir is not writable, or does not exist. Please check');
}
```

## Mudar permissão de arquivos
```php
// Read and write for owner, read for everybody else
chmod('/somedir/somefile', 0644);

// Everything for owner, read and execute for others
chmod('/somedir/somefile', 0755);
```

## Use aspas simples ao invés de aspas duplas sempre que possível: mais rápidas e seguras

## Sempre use exit; após um header()

## Nunca chame uma função dentro de um laço

## Não use ifs sem chaves

Evite
```php
      if($a == true) $a_count++;
```
Use
```php
      if($a == true)
      {
          $a_count++;
      }
```

## Abra uma única vez uma conexão com o banco de dados em todo o processamento do script. De preferência use uma Singleton

## Evite usar variáveis ou métodos globais. Use com moderação e somente quando necessário.

## Algumas funções do PHP para strings
```php
Converter todas as iniciais em maiúsculas - ucwords($str)

Converter a inicial em maiúsculas - ucfirst($str)

Converter toda uma string em maiúsculas - strtoupper($str)

Converter toda uma string em minúsculas - strtolower($str)

Comparar duas strings - strcmp($str1, $str2)
```

## Buscar um caracter específico em uma string e substitui-lo por outro
```php
$texto = 'oi-eu-sou-um-texto';
$resultado = str_replace('-', ' ', $texto);
echo $resultado; // oi eu sou um texto
```

## Como detectar o navegador do usuário em PHP
```php
$useragent = $_SERVER['HTTP_USER_AGENT'];
echo "<strong>Seu navegador é</strong>: " . $useragent;
```

## Contar quantos caracteres ou palavras há em uma string
```php
// Para contar caracteres
$str = 'abcdef';
echo strlen($str); // 6
```

## Para contar palavras
```php
$str2 = 'aqui são quatro palavras';
echo str_word_count($str2); // 4
```

## Para receber arquivos de outros servidores usar curl:
```php
$c = curl_init ( ) ;
curl_setopt ( $c , CURLOPT_URL , $URL ) ;
curl_setopt ( $c , CURLOPT_TIMEOUT , 15 ) ;
curl_setopt ( $c , CURLOPT_RETURNTRANSFER , true ) ;
$content = curl_exec ( $c ) ;
$status = curl_getinfo ( $c , CURLINFO_HTTP_CODE ) ;
curl_close ( $c ) ;
```

## Como mostrar o IP real do visitante?
Você pode utilizar essa informação para mostrar dados personalizados baseados no IP do visitante. Vale ressaltar que tal script não funcionará em casos nos quais o usuário usa navegadores anônimos, como o TOR.
```php
<?php

    //declara função
    function pegaip()
    {
        //verifica se não é vazio
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        //verifica se vem de um proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        //retorna ip
        return $ip;
    }

   echo pegaip();
```

## crop-image
```php
<?php
//https://css-tricks.com/snippets/php/crop-image/
$filename= "boa.jpg";
list($w, $h, $type, $attr) = getimagesize($filename);
$src_im = imagecreatefromjpeg($filename);

$src_x = '0';   // begin x
$src_y = '0';   // begin y
$src_w = '100'; // width
$src_h = '100'; // height
$dst_x = '0';   // destination x
$dst_y = '0';   // destination y

$dst_im = imagecreatetruecolor($src_w, $src_h);
$white = imagecolorallocate($dst_im, 255, 255, 255);
imagefill($dst_im, 0, 0, $white);

imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);

header("Content-type: image/png");
imagepng($dst_im);
imagedestroy($dst_im);
```

## Strings

Convertendo string em array
```php
$myString = "This is a short string";
$myArray = explode(" ", $myString);
print_r($myArray);

Procurar substring em string:

if (strpos("Hello World", "Hello") !== false)
     echo 'Encontrada';

Procurar e sobrescrever

$myString = "There is a cat in the tree, and I think it is my cat!";

echo "Original String = $myString<br>";

$myString = str_replace ("cat", "dog", $myString);

echo "New String = $myString<br>"; // Substituie todos os cat por dog
```
Convertendo array em string
$myArray = [0=>'zero', 1=>'um'];
$myString = implode(" ", $myArray);


## HEREDOC e NEWDOC

Uma forma de pegar uma grande string, com várias linhas e também processando variáveis na string.

HEREDOC
```php
$str = <<<EOD
Introduction of heredoc strings in PHP.
To a complete text.
EOD;

$name = 'PHP language';
echo <<<EOT
I am using "$name"
$example->foo
EOT;
```
NEWDOC - similar ao HERDOC mas com aspas simples
```php
$str = <<<'EOD'
Example of string
spanning multiple lines
using nowdoc syntax.
EOD;

Imprimirá tudo numa única linha.
```

## Remover o caractere inicial de string

$str = substr($str, 1);// Ao invés de começar com 0 começa com 1

## Servidor Nativo do PHP
```php
cd /aplicativo
php -S 127.0.0.1:8080 -t public
http://127.0.0.1:8080

ou
php -S localhost:8080 -t public
http://localhost:8080
```

## Operador ternário
```php
$host = strlen($host) > 0 ? $host : htmlentities($host);

Similar a
if(strlen($host) > 0){
  $host = $host;
}else{
  $host = htmlentities($host);
}
```

## Escalabilidade 
É a capacidade de um aplicativo continuar funcionando adequadamente à medida que a carga de trabalho aumenta.

## Documentação offline

Documentação offline:

https://www.php.net/download-docs.php

https://www.dunebook.com/download-w3schools-offline/

https://www.thecrazyprogrammer.com/2015/01/w3schools-offline-version-download-full-website.html


