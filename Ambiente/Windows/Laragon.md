# Lagaron.org

Atualmente me parece que o Laragon é a melhor opção para se instalarum ambiente de programação web no Windows. Isso porque ele já traz praticamente tudo de que necessitamos para trabalhar.

## Alguns dos seus recursos

- Apache - 2.4.35/ NGinx - 1.16.0
- PHP - 7.4
- Memcached
- Redis
- MySQL - 5.7.24
- Ngrok
- Git
- Composer
- Vim
- Cmdr
- NodeJS - 14
- TailBlazer - visualizador de logs
- Notepad++
- WinSCP
- Putty
- Netstat
- telnet, 
- yarn, 
- Adminer
- Podemos instalar outras versões do php
- Podemos instalar outra versão do mysql/mariadb

## Mais
- Cria automaticamente virtualhost para cada aplicação - pasta.dev
- Na opção criar rapidamente um website, pode criar: Joomla, Wordpress, Drupal, laravel, cakephp, symfony, lumen, etc

Use o Laragon que tem o NGROK.io integrado! Ele te dá uma URL pública para seu amigo acessar o que você está trabalhando. Vantagem de ver em tempo real as alterações e não ter todo aquele trabalho de colocar na hospedagem!

ngrok. Vc consegue liberar o local host para acesso externo. É bem simples de configurar e mais fácil ainda de usar. Usei recentemente num projeto. Recebi de um colega num grupo do Facebook.

## Instalando a última versão do PHP no Laragon

O Laragon vem com a versão 7.2 do PHP e o Laravel 8 exige a 7.3, então vamos instalar também a 7.4 no Laragon

Download

https://windows.php.net/download

Hoje (25/11/2020) a versão Zip é esta

https://windows.php.net/downloads/releases/php-8.0.0-nts-Win32-vs16-x64.zip

Descompactamos e copiamos a pasta para

c:\laragon\bin\php

Ficando neste caso assim:

c:\laragon\bin\php\php-8.0.0-nts-Win32-vs16-x64

Agora poderá selecionar esta versão como a default

Menu - PHP - Version - php-8.0.0-nts-Win32-vs16-x64

Abra o terminal e para confirmar execute

php -v

Botão Quick Add - para instalação de outros softwares, como PostgreSQL, Sublime, VSCode, Eclipse, Java, etc
- Laragon, Ferramentas, QuickAdd

Como criar um novo Virtualhost?
Ficam em c:\laragon ?

Adicionar Notepad++ e Terminal ao botão direito


Praticamente cria um ambiente Linux no Windows

MySQL
login - root
Senha - (em branco)

Para usar o adminer.php atribuir uma senha ao MySQL:
- Clicar sobre sobre a seta da barra de tarefas
	- Então clicar no ícone do Laragon com botão direito
	- MySQL - Parar MySQL
	- MySQL - alterar a senha root
	- MySQL - Iniciar MySQL
	
Diretório web

C:/laragon/www

http://laragon.org

