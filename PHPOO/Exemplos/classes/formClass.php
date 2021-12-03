<?php
// Inspiração: https://book.cakephp.org/3.0/en/views/helpers/form.htmlipo
/**
  * Classe para lidar com formulários HTML
  * Com alguns métodos úteis
  * E com um parâmetro tipo array que recebe mais parâmetros
  * Inspirado no formHelper do CakePHP
  */

class formHtml{
    private $form = '';

    public function formCreate($type='POST', $action='', array $options=[]){
        $this->form = "<form type=\"$type\" action=\"$action\"><br>\n";
        return $this->form;
    }

    public function formClose(){
        $this->form ='</form>'."\n";
        return $this->form;
    }

    public function inputText($name='nome', array $options=[]){
        if($options){
            $this->form = ucfirst($name).": <input type=\"text\" name=\"$name\" class=\"".$options['class']."\"><br>\n";
        }else{
            $this->form = ucfirst($name).": <input type=\"text\" name=\"$name\"><br>\n";
        }
        return $this->form;
    }

    public function inputEmail($name='email', array $options=[]){
        $this->form = ucfirst($name).": <input type=\"email\" name=\"$name\"><br>\n";
        return $this->form;
    }

    public function inputFone($name='telefone', array $options=[]){
        $this->form = ucfirst($name).": <input type=\"tel\" name=\"$name\"><br>\n";
        return $this->form;
    }

}

$f = new formHtml();
print $f->formCreate();
print $f->inputText('Nome', ['class'=>'col-4']); // id e class são obrigatórios
print $f->inputEmail();
print $f->inputFone();
print $f->formClose();
