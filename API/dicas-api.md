# Adicionar mensagem em métodos do controller

```php
    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        response()->json($author, 200);
        return response()
            ->json([
              'data' => [
              'message' => 'Author atualizado com sucesso'
              ]
            ]);
    }

```
