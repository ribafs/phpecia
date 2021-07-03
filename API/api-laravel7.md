# Criação de API usando Laravel 7

laravel new api

cd api

php artisan serve

http://127.0.0.1:8000

Ctrl+C

## Configurara banco no .env
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=api
DB_USERNAME=root
DB_PASSWORD=root
```
Criara model e migration

php artisan make:model Article -m

Edite a mirgation criada e altere o método up para:
```php
public function up()
{
    Schema::create('articles', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->text('body');
        $table->timestamps();
    });
}

php artisan migrate
```
Edite o model em app/Article.php e altere para:
```php
<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $fillable = ['title', 'body'];
}
```
Criar controller
```php
php artisan make:controller ArticleController
```
Editar o controller criado e deixar assim:
```php
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
 
class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function create(Request $request)
    {
       $article = Article::create($request->all());
       response()->json($article, 201);
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
```
Edite routes/api.php e adicione:
```php
use App\Article;
 
Route::get('articles', 'ArticleController@index');
Route::get('articles/{id}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{id}', 'ArticleController@update');
Route::delete('articles/{id}', 'ArticleController@delete');
```
Testando
```php
php artisan serve
http://localhost:8000/api/articles
```
Usar Postman ou Insomnia para testar e gerenciar

