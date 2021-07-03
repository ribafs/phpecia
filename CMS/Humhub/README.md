Humhub

HumHub é uma plataforma de rede social de código aberto (em PHP e MySQL) com uma ampla variedade de casos de uso como intranet social, comunidade ou plataforma de colaboração. O HumHub consiste em um aplicativo central, que pode ser estendido por meio de módulos adicionais e ajustado às suas necessidades por várias opções de configuração.

Casos de uso comuns para HumHub são:

 Comunidades públicas ou privadas
 Intranet Social Empresarial
 Escolas
 Agências
 Município
 Associações

https://humhub.org

https://docs.humhub.org/

Requisitos:

- Servidor web Apache com mod_php ou php-fpm (recommendado)
- Servidor Nginx php-fpm
- PHP 7.1 ou superior (recomendado 7.3 ou 7.4)
- MariaDB 10.1

Instalação

cdr

https://www.humhub.com/en/download/

Copiar o link da versão atual e baixar

wget https://www.humhub.com/download/package/humhub-1.8.0.tar.gz
mkdir hh
tar xvfz humhub-1.8.0.tar.gz
mv humhub-1.8.0 hh
rm humhub-1.8.0.tar.gz

sudo perms hh

ls -la hh

Configurações do PHP para o Humhub

sudo nano /etc/php/7.4/apache2/php.ini

upload_max_filesize = 32M
post_max_size = 32M
max_execution_time = 120

aprel

cp /etc/php/7.4/apache2/php.ini ~/backup

Instalação via web

http://ribafs.me/hh

Escolher língua - Português do Brasil

Avançar

Faltaram algumas extensões

PHP - GraphicsMagick Extension (Hint: Optional)
PHP - LDAP Support (Hint: Optional - Install PHP LDAP Extension)
PHP - SQLite3 Support (Hint: Optional - Install SQLite3 Extension for DB Caching) 

sudo apt update
sudo apt install -y php-imagick graphicsmagick
apres

Testar
php -i |grep imagick

É interessante instalar todas, mas não as instalei

Avançar

Banco de dados

Nome do host ou endereço IP - localhost

Nome do usuário - hh_us

Senha - 

Nome do banco de dados - hh_db

Avançar

Nome da sua Rede Social - Rede Riba

Configuração

Quero usar o HumHub para: marcar um e próximo

Configurações de Segurança

Aqui você pode decidir como novos usuários não registrados podem acessar o HumHub.


O usuário externo pode se inscrever (O formulário de registro será exibido no Login)
X - Usuários recém-registrados precisam ser ativados por um administrador primeiro
Permitir o acesso de usuários não registrados ao conteúdo público (acesso de convidado)
Os membros registrados podem convidar novos usuários por e-mail
X - Permitir amizades entre membros

 Módulos recomendados

HumHub é muito flexível e pode ser ajustado e/ou expandido para várias aplicações diferentes graças aos seus diferentes módulos. Os próximos módulos são apenas alguns exemplos e aqueles que consideramos mais importantes para o aplicativo escolhido.

Você pode sempre instalar ou remover módulos posteriormente. Você pode encontrar mais módulos disponíveis após a instalação na área de administração.


Wiki

Collect and share information with your very own Wiki.
Custom Pages

Allows admins to create custom pages (html or markdown) or external links to various navigations (e.g. top navigation, account menu).
Birthday Widget

Adds a widget to the dashbaord showing upcoming birthdays.
Polls

Easy to use poll system
Mail

A private messaging system for direct communication
Files

Enhance your network with a file managment system
Tasks

Simple taskmanager for your spaces.

Deixei todos marcados e cliquei em Próximo

Aguardar a isntalação dos módulos

Conta de Administrador

Você está quase pronto. Nesta etapa, você deve preencher o formulário para criar uma conta de administrador. Com esta conta você pode gerenciar toda a rede.

Nome de usuário
E-mail
Nova senha
Confirmar nova senha
Geral
Primeiro nome
Último nome

Criar conta de administrador

Conteúdos de Exemplo

Para evitar um painel em branco após o login inicial, o HumHub pode instalar conteúdos de exemplo para você. Eles te darão uma boa visão de como HumHub trabalha. Você sempre pode excluir cada conteúdo individualmente.

Configurar conteúdo de exemplo (recomendado)

Próximo

Parabéns! Você terminou.

A instalação foi concluída com sucesso! Divirta-se com sua nova rede social.

Entrar

Guias
http://ribafs.me/hh/index.php?r=dashboard%2Fdashboard&tour=1
http://ribafs.me/hh/index.php?r=tour%2Ftour%2Fstart-space-tour
http://ribafs.me/hh/index.php?r=user%2Fprofile%2Fhome&tour=true&cguid=186de384-393a-4640-af3d-a1e82269410d
http://ribafs.me/hh/index.php?r=marketplace%2Fbrowse&tour=true

https://www.humhub.com/en/marketplace

User do banco com o privilégios:
SELECT, INSERT, DELETE, UPDATE, CREATE, ALTER, INDEX, DROP, REFERENCES

https://docs.humhub.org/docs/admin/requirements

Instalação

apt update
apt install mariadb-server mariadb-client automysqlbackup
mysql_secure_installation

mysql -u root -p

mysql> CREATE USER 'humhub_prod' IDENTIFIED BY 'change-me';

mysql> CREATE DATABASE `humhub_prod_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
mysql> GRANT ALL ON `humhub_prod_db`.* TO `humhub_prod`@localhost IDENTIFIED BY 'change-me';
mysql> FLUSH PRIVILEGES;

sudo apt update
sudo apt install -y php php-cli php-imagick php-curl php-bz2 php-gd php-intl php-mysql php-zip php-apcu-bc php-apcu php-xml php-ldap


Configurações

/etc/php/7.3/apache2/php.ini

upload_max_filesize = 32M
post_max_size = 32M
max_execution_time = 120

SSL

apt install certbot
certbot certonly --standalone -d temp.humhub.dev

apt update
apt install apache2 \
libapache2-mod-xsendfile \
php-fpm 

<VirtualHost *:443>
  ServerName temp.humhub.dev
  ServerAdmin root@temp.humhub.dev

  SSLEngine on
  SSLCertificateFile	/etc/letsencrypt/live/temp.humhub.dev/cert.pem
  SSLCertificateKeyFile  /etc/letsencrypt/live/temp.humhub.dev/privkey.pem
  SSLCertificateChainFile   /etc/letsencrypt/live/temp.humhub.dev/fullchain.pem

  DocumentRoot /var/www/humhub

  <Directory /var/www/humhub/>
	 Options -Indexes -FollowSymLinks
	 AllowOverride All
  </Directory>

  <DirectoryMatch "/var/www/humhub/(\.|protected|themes/\w+/views|uploads/file)">
	 Order Deny,Allow
	 Deny from all
  </DirectoryMatch>

  <FilesMatch "^\.">
	 Order Deny,Allow
	 Deny from all
  </FilesMatch>
  
  <DirectoryMatch "/var/www/humhub/(static|uploads|themes|assets)">
	Header set Cache-Control "max-age=172800, public"
  </DirectoryMatch>
</VirtualHost>

<VirtualHost *:80>
   ServerName temp.humhub.dev
   Redirect / https://temp.humhub.dev
</VirtualHost>

a2enmod ssl rewrite headers proxy_fcgi setenvif
a2enconf php7.4-fpm
a2ensite humhub

systemctl reload apache2

Configurações na administração

https://docs.humhub.org/docs/admin/installation
https://docs.humhub.org/docs/admin/advanced-configuration

