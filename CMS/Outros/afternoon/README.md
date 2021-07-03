CMS Afternoon

Este tem o tutorial de instalação em https://www.elated.com/cms-in-an-afternoon-php-mysql/

Como eu já segui o tutorial e instalei ele em meu desktop, apenas o enviarei para o servidor para a pasta

/var/www/ribafs/ca

Acessar o terminal no desktop, na pasta onde está a pasta do CMS

scp -P 65522 -rp CMSAfternoon/ ribafs@165.232.148.216:/var/www/ribafs

No servidor

cdr

mv CMSAfternoon ca

Editar

nano config.php

<?php
ini_set( "display_errors", true );
date_default_timezone_set( "America/Fortaleza" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=ca_db" );
define( "DB_USERNAME", "ca_us" );
define( "DB_PASSWORD", "senha" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "login" );
define( "ADMIN_PASSWORD", "senhaforte" );
require( CLASS_PATH . "/Article.php" );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );


Exportar o db.sql para o banco ca_db

mysql -uca_us -p ca_db < db.sql

Acessar

http://ribafs.me/ca

