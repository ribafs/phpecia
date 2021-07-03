<?php
// https://www.youtube.com/watch?v=xVftCc0QbE8&list=PLwXQLZ3FdTVEau55kNj_zLgpXL4JZUg8I&index=11
// Polimorfismo é reescrever/substituir um método herdado da classe pai
// O método reescrito tem outro objetivo que o original

class Animal{
    public function andar(){
        echo 'O animal andou';
    }
}

class Cavalo extends Animal{
    public function andar(){
        echo 'O animal correu';
    }

}

$animal = new Cavalo();
$animal->andar();

