Gerador de relatórios

Detalhes na pasta Lotes, inclusive um script sql para teste.

Requisitos

- PHP 5.6
- Composer

Crie um banco no PostgreSQL chamado relatorios

Nele crie a tabela lotes como abaixo:

CREATE TABLE lotes (
  id serial primary key,
  irrigante varchar(50) NOT NULL,
  data date NOT NULL,
  valor decimal (8,2) NOT NULL
);

Inicialmente vamos criar um relatório para mostrar os lotes pela data, semelhante ao exemplo
https://github.com/ribafs/reports/tree/main/exemplos/CarsByDate

Faça o download daqui

https://github.com/ribafs/report-generator

Crie uma pasta no seu diretório web

mkdir /var/www/html/relatorios

Descompacte na pasta acima

Acesse o terminal/prompt na pasta acima e execute

composer install

Abra pelo navegador em

http://localhost/relatorios

Preencha o formulário com os dados do banco e do relatório.


== Limitações atuais do gerador:

- O campo que será mostrado na horizontal precisa ser do tipo date

Então usaremos o data na horizontal e o valor na vertical


