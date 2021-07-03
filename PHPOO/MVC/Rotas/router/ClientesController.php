<?php

class ClientesController
{
  public function index(){
    // Instanciar o model e executar o método index() armazenando o resultado numa variável
    print 'Clientes Controller index';
    // Chamar a respectiva view passando parâmetros
  }

  public function add(){
    print 'Clientes Controller Add ';
  }

  public function edit($id){
    print 'Clientes Controller edit '.$id;
  }

  public function delete($id){
    print 'Clientes Controller delete '.$id;
  }

}
