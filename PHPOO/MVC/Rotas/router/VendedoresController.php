<?php

class VendedoresController
{
  public function index(){
    // Instanciar o model e executar o método index() armazenando o resultado numa variável
    print 'Vendedores Controller index';
    // Chamar a respectiva view passando parâmetros
  }

  public function add(){
    print 'Vendedores Controller Add ';
  }

  public function edit($id){
    print 'Vendedores Controller edit '.$id;
  }

  public function delete($id){
    print 'Vendedores Controller delete '.$id;
  }

}
