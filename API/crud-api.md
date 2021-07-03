# Um mesmo aplicativo pode conter duas versões:

- CRUD
- API

A API tem seu arquivo de rotas em routes/api.php e o aplicativo web em routes/web.php

O controller tem seu próprio namespace, ficando em app/Http/Controllers/API

O código usando MVC é diferente de API.

Chamar API
http://localhost:8000/api/clientes

Chamar CRUD
http://localhost:8000/clientes
