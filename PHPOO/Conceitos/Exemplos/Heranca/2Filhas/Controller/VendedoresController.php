<?php
declare(strict_types = 1);

namespace App\Controller;

use Core\Controller;

class VendedoresController
{
    public function index()
    {
        $Obj = new Controller('vendedores');      
        $Obj->index();
    }

    public function add(){
      $Obj = new Controller('vendedores');
      $Obj->add();
    }

    public function delete($field_id){
      $Obj = new Controller('vendedores');
      $Obj->delete($field_id);
    }

    public function edit($field_id){
      $Obj = new Controller('vendedores');
      $Obj->edit($field_id);
    }

    public function update(){
      $Obj = new Controller('vendedores');
      $Obj->update();
    }

}
