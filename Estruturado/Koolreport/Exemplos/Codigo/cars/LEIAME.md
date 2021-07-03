Relatório em PHP acessando PostgreSQL com gráfico de Pizza

Detalhes

https://www.koolreport.com/

Requisitos

- PHP 5.6
- Composer

Precisar escolher bem os dois campos que representarão as colunas vertical e horizonta.

Aqui escolhi:

- color - horizontal
- value - vertical

Ele agrupará os registros pela cor e as mostrará na horizontal.

Também poderiamos escolher date e value, então ele agruparia pelo mês de cada data

Download de 
https://github.com/ribafs/reports

E descompactar na pasta

mkdir /var/www/html/frutas-rel

Acessar a pasta acima pelo terminal/prompt e executar

composer install

Copiar um exemplo pronto

exemplos/CarsByDate para a pasta

vendor/koolreport

Edite o arquivo

vendor/koolreport/CarsByDate.php

E configure a conexão com o banco na fun ção settings(), como abaixo:

"connectionString"=>"pgsql:host=localhost;dbname=frutas-rel",


Chame pelo navegador

http://localhost/projeto/vendor/koolreport


