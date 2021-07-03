# Relatando minhas descobertas no mundo Linux

Lembrando que não existe uma distribuição linux perfeita sob encomenda para servir de ambiente de programação para cada um de nós. É importane conhecer várias distribuições e selecionar a que mais se aproxima daquela que oferece tudo que precisamos em uma distribuição.

## Características de uma boa distribuição para mim
- Ela traz suporte principalmente ao PHP e cia, especialmente ao PHP recente (7.4) e várias extensões
- Ao apache 2.4, ao mod_rewrite e outros módulos e ao MySQL 5.7 ou superior
- Ausência de bugs especialmente no AMP
- Simplicidade na configuração do Apache, PHP e criação de virtualhost
- Ao composer
- Ao Git
- Ao Virtualbox e Vagrant
- Ao VSCode
- Kolourpaint
- Vokoscreen
- Vem com Libreoffice, Firefox
- Google Chrome
- Facilidades de um bom desktop desktop: instalação gráfica de pacoes .deb/.rpm, descompactação/compactação no modo gráfico, etc

## Testes com algumas distribuições Linux no Desktop

Relato da minha experiência com algumas distribuições Linux no desktop

- Linux Mint 19.3 (PHP 7.2)
- Linux Mint LMDE4 e Debian 10 (PHP 7.3)
- Fedora 32 (PHP 7.4)
- OpenSuse Tumbleweed (PHP 7.0)
- Ubuntu 20.04 (PHP 7.4)

## Alguns comandos úteis

- sudo apt update (atualizar repositórios)
- sudo apt upgrade (atualizar distribuição)
- sudo apt install aptitude
- sudo aptitude search php
- Descompactar arquivo
unzip nome.zip (descompactará na pasta atual)
unzip -d /home/ribafs/testes nome.zip (descompacta na pasta indicada)


### Serviços

- sudo service apache2 restart
- sudo service mysql restart

## Dicas de uso do terminal
Copiar e Colar
- copiar - apenas selecione
- colar - Shift+Insert


