# Criar API com Gerador de CRUDs no Laravel 7

## Instalar laravel

laravel new api-produtos

cd api-produtos

# Instalação do gerador
composer require appzcoder/crud-generator --dev

## Executar para publicar
php artisan vendor:publish --provider="Appzcoder\CrudGenerator\CrudGeneratorServiceProvider"

## Configurar
Editar config/app.php e adicionar nas duas seções
```php
'providers' => [
        Collective\Html\HtmlServiceProvider::class,

'aliases' => [
        'Form' => Collective\Html\FormFacade::class,
        'HTML' => Collective\Html\HtmlFacade::class,
```
## Criar API
php artisan crud:api Produto --fields='nome#string; preco#integer' --controller-namespace=Api

## Configurar o banco no .env
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=api
DB_USERNAME=root
DB_PASSWORD=root
```
## Executar migrate
php artisan migrate

## Testar
php artisan serve

http://localhost:8000/api/produto

Agora adicione um produto ao banco de dados e execute novamente

http://localhost:8000/api/produto

## Agora é o momento de usar o Postman para gerenciar

## Select com GET

No Postman chame

http://localhost:8000/api/produto

Com GET

## Insert com POST

Agora entre com Params em http://localhost:8000/api/produto usando POST
- Key     Value
- nome    Manga
- preco   1

Clique em Send para adicionar um registro

Chame GET em http://localhost:8000/api/produto para ver o registro adicionado

## Update com PUT

Chame

PUT http://localhost:8000/api/produto/1

Key
- nome    Goiaba
- Send

Agora chame com GET para verificar a mudança

## Delete com DELETE

DELETE http://localhost:8000/api/produto/2

Send

Use GET para verificar a exclusão


