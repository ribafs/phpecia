<?php
// Criada por Ribamar FS
// Todos os elementnos de um form do HTML5 e quase todos os atributos
class Form
{
  public function formStart($name, $id='', $method='POST', $action='', $target='blank')// target: _blank, _parent, _self, _top
  {
  	$form = trim(strip_tags(htmlspecialchars($name)));
  	if ((!empty($name) && trim($name)!='')){
      $form = "<form name=\"$name\" method=\"$method\" id=\"$id\" action=\"$action\" target=\"$target\">";
  	}else {
  	    return 'Invalid Form';
  	}
  	    return $form."\n";
  }

 public function inputLabel($name)
  {
  	$label= '';
  	$name = trim(strip_tags(htmlspecialchars($name)));
  	$label ="<label for =\"$name\">".ucFirst($name)."</label>";
  	return $label;
  }

  public function formEnd()
  {
  	$_formend = '';
  	$_formend = '</form>';
  	return $_formend.'<br>';
  }

  public function input($name='', $value=null, $size=20, $max=20, $readonly=1, $required=0, $placeholder='', $autofocus=1) 
  {
  	$_element = '';
  	
  	if ((!empty($name) && trim($name)!='')){
 	    $name=trim(strip_tags(htmlspecialchars($name)));
  		$value=trim(strip_tags(htmlspecialchars($value))); 
      if($readonly == 1) $readonly = 'readonly';
      if($required == 1) $required = 'required';
      if($autofocus == 1) $autofocus = 'autofocus';

 	    $_element .= $this->inputLabel($name)." <input type=\"text\" name=\"$name\" size=\"$size\" maxlength=\"$max\" value=\"$value\" placeholder=\"$placeholder\"  $autofocus $readonly $required>"."\n<br>";
  	}
  	else {
  		return 'Invalid Element';
  	}  
    return $_element.'<br>';
   }  

   public function inputTextArea($name='', $value=null, $rows='5', $cols='60')
   {
   	$_element = '';
   	if(!empty($name) && trim($name)!=''){
   	    $_element .= $this->inputLabel($name).'<br><textarea name=$name rows=$rows cols=$cols';
   	    $_element .= '>';
   	    $_element .= trim(strip_tags(htmlspecialchars($value)));
   	    $_element .= '</textarea>';
   	}else {
   		return 'Invalid Element';
   	}
   	
     	return $_element."\n<br>";
   }  

   public function inputSelect($name='', $id=null, $class='', $values=array(), $selected=null, $attributes=array())
   {
   	$_element = '';
    $_status = '';
    
   	if(!empty($values) && (!empty($name) && trim($name)!='')){
   		$_element .= $this->inputLabel($name)."\n".'<select name=$name id=$id';
   		$_element .= ' '.implode(' ', $attributes); //add any other additional html attributes, css styling or javascript functions for example
   		$_element .= '>';
   		
   	foreach($values as $val){
   		$val=trim(strip_tags(htmlspecialchars($val)));
   		
   		if($selected==$val){
   			$_status='selected';
   		}else {
   			$_status='';
   		}
   		$_element .= '\n<option value=$val';
   		$_element .= $_status.' >';  
   		$_element .= $val;
   		$_element .= '</option>';
   	}
   	}else {
   		return 'Invalid Element';
   	}

   	    $_element .= "\n".'</select>'."\n<br>";
   	    return $_element;
   }

  public function inputRadio($name, $label = 'Times',$values = array(), $id = '', $selected = '')
  {
    $radio = $this->inputLabel($name)."<br>\n";
    foreach($values as $value){
      if($selected == $value){
        $radio .="<input type=\"radio\" name=\"$name\" value=\"$value\" checked $selected>".$value."\n";
      }else{
        $radio .="<input type=\"radio\" name=\"$name\" value=\"$value\">".$value."\n";
      }
    }
     return $radio."<br>\n";
  }

    public function inputCheckbox($name, $label = '', $values = array(), $id = '', $selected = '')
    {
      $check = $this->inputLabel($name)."<br>\n";
      foreach($values as $value){
        if($selected == $value){
          $check .="<input type=\"checkbox\" name=\"$name\" value=\"$value\" checked $selected>".$value."\n";
        }else{
          $check .="<input type=\"checkbox\" name=\"$name\" value=\"$value\">".$value."\n";
        }
      }
       return $check."<br>\n";
    }

    public function inputColor($name, $value = '#fff')
    {
      $color = $this->inputLabel($name)."<br>";
      foreach($values as $value){
        $color .="<input type=\"color\" name=\"$name\" value=\"$value\">\n";
      }
       return $color."<br>\n";
    }

    public function inputDate($name,$value = '')
    {
      $date = $this->inputLabel($name)."<br>";
      foreach($values as $value){
        $date .="<input type=\"date\" name=\"$name\" value=\"$value\">\n";
      }
       return $date."<br>\n";
    }

    public function inputDateTime($name, $value = '')
    {
      $date = $this->inputLabel($name)."<br>";
      foreach($values as $value){
        $date .="<input type=\"datetime\" name=\"$name\" value=\"$value\">\n";
      }
       return $date."<br>\n";
    }

    public function inputMonth($name,$value = '')
    {
      $month = $this->inputLabel($name)."<br>";
      foreach($values as $value){
        $month .="<input type=\"month\" name=\"$name\" value=\"$value\">\n";
      }
       return $month."<br>\n";
    }
    
    public function inputNumber($name, $value = '')
    {
      $number = $this->inputLabel($name)."<br>";
      foreach($values as $value){
        $number .="<input type=\"number\" name=\"$name\" value=\"$value\">\n";
      }
       return $number."<br>\n";
    }
    
    public function inputRange($name, $value = '')
    {
      $range = $this->inputLabel($name)."<br>";
      foreach($values as $value){
        $range .="<input type=\"range\" name=\"$name\" value=\"$value\">\n";
      }
       return $range."<br>\n";
    }
    
    public function inputSearch($name)
    {
      $search = $this->inputLabel($name)."<br>";
      $search .="<input type=\"search\" name=\"$name\">\n";
       return $search."<br>\n";
    }
    
    public function inputTel($name, $pattern = '[0-9]{3}-[0-9]{3}-[0-9]{3}')// Ex: 085-3391-2356
    {
      $tel = $this->inputLabel($name)."<br>";
      $tel .="<input type=\"tel\" name=\"$name\" pattern=\"$pattern\">\n";
      return $tel."<br>\n";
    }
    
    public function inputTime($name)
    {
      $time = $this->inputLabel($name)."<br>";
      $time .="<input type=\"time\" name=\"$name\">\n";
      return $time."<br>\n";
    }
    
    public function inputUrl($name)
    {
      $url = $this->inputLabel($name)."<br>";
      $url .="<input type=\"url\" name=\"$name\">\n";
      return $url."<br>\n";
    }
    
    public function inputWeek($name)
    {
      $week = $this->inputLabel($name)."<br>";
      $week .="<input type=\"week\" name=\"$name\">\n";
      return $week."<br>\n";
    }

    public function inputButton($type,$name, $value)
    {
      $but = '';
      $but .="<input type=\"$type\" name=\"$name\" value=\"$value\">\n";
      return $but."<br>\n";
    }

}

$form = new Form();
print $form->formStart('frmTeste', $id='', $class='',$method='POST',$target='_blank');
print $form->input($name='nome', $value=null, $size=40, $max=50, $readonly=0, $required=1, $placeholder='Teste', $autofocus=1);
print $form->inputTextArea($name='txtAr', $id=null, $value='$name');
print $form->inputSelect($name='sel', $id=null, $class='', $values=array(0=>'zero', 1=>'um', 2=>'dois'), $selected='dois', $attributes=array(0=>'zero',1=>'um', 2=>'dois'));
print $form->inputRadio('times', $label = 'Times de futebol', $values = ['Ceará', 'Fortaleza', 'Tiradentes'], $id = '', $selected = 'Tiradentes');
print $form->inputCheckbox('paises', $label = 'Países', $values = ['Brasil', 'EUA', 'África do Sul'], $id = '', $selected = 'África do Sul');
print $form->inputButton('submit','enviar','Enviar');
print $form->formEnd();
