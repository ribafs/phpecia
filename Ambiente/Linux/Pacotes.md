## 5.2 - Ambiente de programação no Linux

No Linux minha recomendação é para uso dos pacotes da distribuição.

Evite usar o Xampp no Linux. Já que está no Linux, que tal usar seus recursos para teu benefício?

Instalando os pacotes da distribuição a atualização deles será automática. Aparece aviso no desktop, você clica e atualiza. Com atualizações ágeis temos correção de bugs, de segurança e adição de melhorias.

### Script para instalação dos pacotes

Para facilitar e muito a instalação dos pacotes podemos criar um script simples que os instalará todos de uam vez. Basta relacioná-los no script.

Criar o script. No meu caso, a distribuição Linux Mint 20 tem o PHP 7.4. Caso sua distribuição use outra versão faça as devidas adaptações, assim como se você usar uma distribuição que não usa o gerenciador apt.

install.sh

```bash
#!/bin/bash
#
# Criado/adaptado por Ribamar FS - http://ribafs.org
# Instalação dos pacotes do LAMP no linux mint 20)
#
apt install -y dialog;
#
while :
 do
    clear
servico=$(dialog --stdout --backtitle 'Instalação de pacotes no Ubuntu Server 16.04 LTS - 64' \
                --menu 'Selecione a opção com a seta ou o número e tecle Enter\n' 0 0 0 \
                1 'Atualizar repositórios' \
                2 'Instalar LAMP e outros' \
                0 'Sair' )
    case $servico in
      1) apt update;;
      2) clear;
# "Instalar pacotes básicos. Tecle Enter para instalar!";
apt install -y apache2 libapache2-mod-php7.4 aptitude git mc;

# Instalar SGBDs somente para testes locais. Aqui podemos instalar mariadb-server ao invés do mysql
apt install -y mysql-server;

# "Instalar PHP 7 e extensões. Tecle Enter para instalar!";
apt install -y php7.4 php7.4-bcmath php7.4-gd php7.4-mysql php7.4-curl;
apt install -y php-pear php7.4-xml php7.4-xsl curl phpunit php-xdebug php7.4-intl composer;
apt install -y php7.4-zip php7.4-mbstring php-gettext php-mbstring php7.4-fpm;
phpenmod mbstring;

# "Instalar suporte a cache no PHP. Tecle Enter para instalar!";
apt install -y php-apcu;

wget http://spout.ussg.indiana.edu/linux/ubuntu/pool/main/m/memcached/memcached_1.5.10-0ubuntu1_amd64.deb;
dpkg -i memcached_1.5.10-0ubuntu1_amd64.deb;
apt install -y php-memcache;

a2enmod rewrite;
systemctl restart apache2;

apt update;
apt upgrade -y;;
      0) clear;exit;;
   esac
done
```

Executar na mesma pasta do script 

sudo sh install.sh

Agora, se tudo correu bem, você já pode usar o PHP, o MySQL, git, composer e cia.

php -v

mysql --version

git --version

composer --version

### Configurações básicas

### Configurar php

display_errors = On
```bash
sudo nano /etc/php/7.2/apache2/php.ini
```
### Configurar apache
```bash
sudo nano /etc/apache2/apache2.conf
```
Adicione
```bash
ServerName localhost
```

Troque as 3 ocirrências de None por All em <Directory />

```bash
sudo systemctl restart apache2
```

