# Criar API para laravel 7 usando o gerador de CRUD/API

## Instalar laravel
laravel new api-clientes
cd api-clientes

## Instalar o geradord e CRUDs
composer require appzcoder/crud-generator --dev

## Publicar
php artisan vendor:publish --provider="Appzcoder\CrudGenerator\CrudGeneratorServiceProvider"

## Configurar

Configure o banco no .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud
DB_USERNAME=root
DB_PASSWORD=root

config/app.php

```php
'providers' => [
    //...

    Collective\Html\HtmlServiceProvider::class,
],

'aliases' => [
    //...

    'Form' => Collective\Html\FormFacade::class,
    'HTML' => Collective\Html\HtmlFacade::class,
],
```

## Criar o CRUD clientes para API

php artisan crud:api Clientes --fields='nome#string; email#string' --controller-namespace=Api

Observe que a tabela terá apenas dois campos, nome e email e que o controller será gerado na pasta Api.

## Execute

php artisan migrate

## Testando

php artisan serve

http://localhost:8000/api/clientes

Detalhes
https://github.com/ribafs/crud-generator/blob/master/doc/README.md


