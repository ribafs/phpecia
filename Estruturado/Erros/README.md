Trabalhando com Erros no PHP

Em ambiente de desenvolvimento, no desktop é importante ativar a exibição de erros, especialmente no php.ini

Quando enviamos nosso aplicativo para o servidor, no ambiente de produção, é importante, por cotna da segurança, desativar todas as mensagens de erro: no php.ini, se tivermos acesso ao mesmo ou usando ini_set() caso não tenha os acesso ao php.ini. 

Também é importante desativar as mensagens de erro no CMS que usamos, em sua área administrativa.

Os .htaccess também são bons recursos para trabalhar com as mensagens de erro, mas precisamos tomar cuidado com seu trabalho. Idealmente faça uma cópia dele antes de alterá-lo.

Ferramentas úteis no trabalho com erros no desktop:

Xdebug - excelente ferramenta. Se usando Linux pode serinstalado com o pacote php-xdebug. Em outros sistemas operacionais basta descomentar e restartar o servidor web

Se usa o VSCode ele já vem com a ferramenta Debug, que fica na barra lateral esquerda. Antes instale as extensões PHP Xdebug e PHP Debug

Exemplo de código

<?php

echo 'Teste'

Veja que não usamos propositalmente o ; ao final da linha.

Salvar o arquivo em qualquer pasta.

Após instalar as duas extensões acima clique em Run and Debug na barra lateral esquerda

Então clique em Run and Debug

Veja que será apresentada a mensagem de erro na área do terminal abaixo:
PHP Parse error:  syntax error, unexpected end of file, expecting "," or ";" in /backup/transp/apagar.php on line 5

Então adicione o ; ao final da linha e tecle novamente em Run and Debug

Agora nos mostra no terminal

Teste

Customizando o Debug

Clicar em Run and Debug

Clicar em create a launch.json file

Aparece

{
    // Use IntelliSense to learn about possible attributes.
    // Hover to view descriptions of existing attributes.
    // For more information, visit: https://go.microsoft.com/fwlink/?linkid=830387
    "version": "0.2.0",
    "configurations": [
        
    ]
}

à direita existe um botão Add Configuration

Clique em Add Configuration

Selecione PHP Listen for XDebug

Aparecerá algo assim:

{
    // Use IntelliSense to learn about possible attributes.
    // Hover to view descriptions of existing attributes.
    // For more information, visit: https://go.microsoft.com/fwlink/?linkid=830387
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for XDebug",
            "type": "php",
            "request": "launch",
            "port": 9000
        }
    ]
}

Tecle Ctrl+S

Agora teremos uma barra do Debug acima e ao centro: reiniciar, parar, pause, step, 

Podemos programar para que o Xdebug pare em certa linha. Basta clicar à esquerda do número de linha em que desejamos que pare na execução.

Logo após o Ctrl+S aparece o painel esquerdo dividifo em 3 áreas: variables, watch e call stack


https://www.treinaweb.com.br/blog/aprenda-como-configurar-o-vs-code-para-debug-de-codigo-php/



Também podemos trabalhar com os erros nos arquivos de log.
