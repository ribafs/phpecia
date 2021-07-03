# AJAX

## Assíncrono JavaScript com XML.

AJAX trata de carregar dados do servidor para o cliente em background e mostrar na página sem recarregar toda a página.

Com os métodos ajax do jQuery podemos requisitar texto, HTML, XML, JSON e JavaScript de um servidor remoto usando POST ou GET. E podemos carregar os dados externos diretamente em um elemento HTML selecionado da página.

AJAX com jQuery fica mais simples pois a jQuery lida com a compatibilidade dos navegadores. Podemos escrever funcionalidade AJAX com apenas uma única linha de código.

Método load() da jQuery - carrega dados do servidor e coloca o retornado dado no elemento selecionado.

$(seletor).load(URL, data, callback);

- URL - o parâmetro obrigatório URL especifica a URL que você deseja carregar
- data - O opcional parâmetro data especifica um conjunto de querystring de pares key/value para enviar com a requisição.
- callback - o parâmetro opcional callback é o nome de uma função para ser executada após o método load() ser completado

Exemplo:

Criar o arquivo
demo.txt

Contendo:

Com os métodos ajax do jQuery podemos requisitar texto, HTML, XML, JSON e JavaScript de um servidor remoto usando POST ou GET. E podemos carregar os dados externos diretamente em um elemento HTML selecionado da página.

Crie um arquivo load.html contendo:
```html
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("#div1").load("demo.txt");
    });
});
</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>

</body>
</html>
```
Abra load.html no navegador para testar.

A função de callback pode ter diferentes parâmetros:
- responseTxt - contém o conteúdo resultante se a chamada for bem sucedida
- statusTxt - contém o status da chamada
- xhr - contém o objeto XMLHttpRequest

O seguinte exemplo mostra um alert após o método load() completar. Se funcionar mostra a mensagem de sucesso e se falhar mostra a mensagem de erro.
```js
$("button").click(function(){
    $("#div1").load("demo_test.txt", function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            alert("External content loaded successfully!");
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
});
```
## Métodos get() e post()

Estes métodos são usados para requisitar dados do servidor com requisição HTTP GET ou POST. Estes dois métodos são os mais usados para request-response entre um cliente e o servidor.

- GET - Requer dados de um recurso específico
- POST - Envia dados para serem processados para um recurso específico

- GET é usado basicamente para receber dados do servidor, retornando dados do cache
- POST é usado para enviar dados para o servidor, mas nunca faz cache dos dados

## Método jQuery $.get()

Requisita dados do servidor usando o método HTTP GET

$.get(URL, callback);

URL - a URL para a requisição

callback - parâmetro opcional é o nome de uma função para ser executada se a requisição for bem sucedida.
```html
<link href="https://code.jquery.com/jquery-2.2.4.min.js" rel="stylesheet">

<script>
$("button").click(function(){
    $.get("demo.php", function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    });
}); 
</script>
```
O primeiro parâmetro da função de callback (data) lida com o conteúdo da página requisitada
O segundo parâmetro (status) lida com o status da requisição

Arquivo demo.php
```php
<?php
print 'Este texto veio do php';
```
