<?php
// https://www.youtube.com/watch?v=1xY2jbxyxyI&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=12
// Uma interface serve de modelo para outras clases. Define as assinaturas de métodos a serem implementados nas classes que a implementam

interface Crud{
    public function create();
    public function read($id);
    public function update($id);
    public function delete($id);
}

class Noticia implements Crud{
    public function create(){
        echo 'Lógica para create';
    }

    public function read($id){
        echo 'Lógica para read';
    }

    public function update($id){
        echo 'Lógica para update';
    }

    public function delete($id){
        echo 'Lógica para create';
    }

}

$noticia = new Noticia();
$noticia->create();
