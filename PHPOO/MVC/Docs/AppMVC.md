# 8.0 - Criação de um aplicativo em PHP usando MVC

Com PDO, BootStrap e loutros bons recursos.

### Mini MVC

### Repositório deste aplicativo

https://github.com/ribafs/mini-mvc2

Este aplicativo é oriundo basicamente de 3 outros:

- Playlist Criação de um Micro Framework do Zero - Curso com 64 aulas

https://www.youtube.com/playlist?list=PLSYIyzca1f9wGynWlC-SH2lVBkE8S81A0

https://github.com/tjgweb/micro-framework

- Curso com 70 aulas (em inglês)

https://www.youtube.com/playlist?list=PLFPkAJFH7I0keB1qpWk5qVVUYdNLTEUs3

- Código fonte

https://bitbucket.org/parhamcurtis/ruahmvcyoutubecourse/src

- Mini Framework

https://github.com/ribafs/mini-framework. Este é oriundo deste https://github.com/ribafs/mini3

Aqui continuei usando muita coisa do mini-framework, mas com algumas alterações:

- Estrutura de diretórios agora com
    - /app - classes e arquivos do aplicativo
    - /core - classes e arquivos do núcleo
- Que também mudow o composer.json
- Classes base agora são abstract, para impedir o instanciamento, permitir somente extender
- Views agora incorporaram os templates e todos os seus arquivos tem extensão .phtml
- Usei parte do micro-framework, mas não usei o eloquent. Preferi o PDO, por ter mais documentação disponível
- bootstrap ficou em Core e config em App

Adicionei ao config

```php
if(DEBUG) {
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
} else {
  error_reporting(0);
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  ini_set('error_log', ROOT . DS .'tmp' . DS . 'logs' . DS . 'errors.log');
}
```
DEBUG por padrão é true

