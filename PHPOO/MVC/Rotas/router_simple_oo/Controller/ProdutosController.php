<?php

require './Model/ProdutosModel.php';
require './View/ProdutosView.php';

class ProdutosController
{
    public function index(){
        $model = new ProdutosModel();
        $model = $model->index();
        $view = new ProdutosView();
        $view = $view->index();
        return 'Index do produtos controller'. $model . $view;
    }
}
