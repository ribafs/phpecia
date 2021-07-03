# PHP Moderno

## Front Controller
O Front Controller é o ponto de entrada do aplicativo, é o arquivo PHP que lida com todas as solicitações de um aplicativo. É o primeiro arquivo PHP que uma solicitação acessa no seu aplicativo e (essencialmente) o último arquivo PHP que uma resposta percorre ao sair do aplicativo.

public/index.php

Para auxiliar o index.php acima tenho no raiz um .htaccess redirecionando tudo para o /public e dentro do /public tenho outro .htaccess redirecionando tudo que chega ao /public para o /public/index.php

Algo assim
```php
<?php
declare(strict_types = 1); 

require __DIR__ . '/../core/bootstrap.php';
```

## strict_types
Para o topo de todos os arquivos .php adicione no início
```php
<?php
declare(strict_types=1);
```

## Namespace
Namespace com composer e PSR-4
O uso deste padrão do FIG possibilita que tenhamos facilidade ao trabalhar com classes e não precisemos ficar digitando includes ou requires.
Pra isso usamos o

composer.json

## Routing

A URI /products/purple-dress/medium
Deve ser manipulada pelo controller ProductDetails com o action purple-dress e o argumento medium passado

