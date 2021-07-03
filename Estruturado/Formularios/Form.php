<?php

class Form
{
// Elementos: text, password, hidden, url, email, date, time, datetime, month, week, color, tel, search, range, number
// Atributos: formmethod, formtarget, size, id, class, maxlenght, name, value, disabled, readonly, placeholder, pattern, required, autofocus, autocomplete
// formtarget: _blank (nova janela ou aba), _parent, _self (mesma janela), _top

  public function formStart($name, $id='', $class='',$method='POST', $action='')
  {
  	$_formstrt = '';
  	if ((!empty($name) && trim($name)!='')){
  	    $_formstrt = '<form';
  	    $_formstrt .= ' name = "'.trim($name)."\"";
  	    $_formstrt .= ' id = "'.trim($id)."\"";
  	    $_formstrt .= ' class = "'.trim($class)."\"";
  	    $_formstrt .= ' method = "'.trim($method)."\"";
  	    $_formstrt .= ' action = "'.trim($action)."\"";
  	    $_formstrt .= '>';
  	}else {
  	    return 'Invalid Form';
  	}
  	    return $_formstrt;
  }

 public function inputLabel($name)
  {
  	$label= '';
  	$name = trim(strip_tags(htmlspecialchars($name)));
  	$label ="<label for =\"".$name."\">".$name."</label>";
  	return $label;
  }

  public function formEnd()
  {
  	$_formend = '';
  	$_formend = '</form>';
  	return $_formend;
  }

  public function input($type='text', $name='', $id=null, $class='', $value=null, $attributes=array()) 
  {
  	$_element = '';
  	$type = strtolower($type);
  	
  	if ((!empty($name) && trim($name)!='')){
  	    $name=trim(strip_tags(htmlspecialchars($name)));
  		$value=trim(strip_tags(htmlspecialchars($value)));
  		  		
  	    if($type == 'radio' || $type == 'checkbox'){ //specify a label for each radio or checkbox
  		  $_element .="&nbsp<label for =".$value.">".$value."</label>";
  		}
  	    $_element .= "<input type=\"$type\" name=\"$name\" id=\"$id\" class=\"$class\" value=\"$value\"";
  	}
  	else {
  		return 'Invalid Element';
  	}
 
    $_element .= ' '.implode(' ', $attributes); //add any other additional html attributes, css styling or javascript functions for example
    $_element .= ' />';
   
    return $_element;
   }  

   public function inputTextArea($name='', $id=null, $value=null, $rows=5, $cols=20)
   {
   	$_element = '';
   	if(!empty($name) && trim($name)!=''){
   	    $_element .= "<textarea name=\"$name\" id=\"$id\" rows=\"$rows\" cols=\"$cols\"";
   	    $_element .= '>';
   	    $_element .= trim(strip_tags(htmlspecialchars($value)));
   	    $_element .= '</textarea>';
   	}else {
   		return 'Invalid Element';
   	}
   	
     	return $_element;
   }  

   public function inputSelect($name='', $id=null, $class='', $values=array(), $selected=null, $attributes=array())
   {
   	$_element = '';
    $_status = '';
    
   	if(!empty($values) && (!empty($name) && trim($name)!='')){
   		$_element .= "\n<select name=\"$name\" id=\"$id\"";
   		$_element .= ' '.implode(' ', $attributes); //add any other additional html attributes, css styling or javascript functions for example
   		$_element .= '>';
   		
   	foreach($values as $val){
   		$val=trim(strip_tags(htmlspecialchars($val)));
   		
   		if($selected==$val){
   			$_status='selected';
   		}else {
   			$_status='';
   		}
   		$_element .= "\n<option value=\"$val\"";
   		$_element .= $_status.' >';  
   		$_element .= $val;
   		$_element .= '</option>';
   	}
   	}else {
   		return 'Invalid Element';
   	}

   	    $_element .= "\n".'</select>';
   	    return $_element;
   }

  public function inputRadio($name, $label = 'Times',$values = array(), $id = '', $selected = '')
  {
    $radio = $label."\n";
    foreach($values as $value){
      if($selected == $value){
        $radio .="<input type=\"radio\" name=\"$name\" value=\"$value\" checked $selected>".$value."\n";
      }else{
        $radio .="<input type=\"radio\" name=\"$name\" value=\"$value\">".$value."\n";
      }
    }
     return $radio;
  }

    public function inputCheckbox($name, $label = '', $values = array(), $id = '', $selected = '')
    {
      $check = $label."\n";
      foreach($values as $value){
        if($selected == $value){
          $check .="<input type=\"radio\" name=\"$name\" value=\"$value\" checked $selected>".$value."\n";
        }else{
          $check .="<input type=\"radio\" name=\"$name\" value=\"$value\">".$value."\n";
        }
      }
       return $check;
    }

    public function inputColor($data, $label = '', $value = '', $id = '', $string = '', $inline = '')
    {

    }

    public function input_date($data, $label = '', $value = '', $id = '', $string = '', $inline = '')
    {

    }
    public function input_datetime($data, $label = '', $value = '', $id = '', $string = '', $inline = '')
    {
    }

    public function input_month($data, $label = '', $value = '', $id = '', $string = '', $inline = '')
    {
    }
    
    public function input_number($data, $label = '', $value = '', $id = '', $string = '', $inline = '')
    {
    }
    
    public function input_range($data, $label = '', $value = '', $id = '', $string = '', $inline = '')
    {
    }
    
    public function input_search($data, $label = '', $value = '', $id = '', $string = '', $inline = '')
    {
    }
    
    public function input_tel($data, $label = '', $value = '', $id = '', $string = '', $inline = '')
    {
    }
    
    public function input_time($data, $label = '', $value = '', $id = '', $string = '', $inline = '')
    {
    }
    
    public function input_url($data, $label = '', $value = '', $id = '', $string = '', $inline = '')
    {
    }
    
    public function input_week($data, $label = '', $value = '', $id = '', $string = '', $inline = '')
    {
    }


}

$form = new Form();
print $form->formStart('frmTeste', $id='', $class='',$method='POST',);
print "\n".$form->inputLabel('Teste');
print $form->input($type='text', $name='nome', $id=null, $class='', $value=null, $attributes=array());
print "\n<br>".$form->inputTextArea($name='txtAr', $id=null, $value='$name', $rows=5, $cols=20);
print "\n<br>".$form->inputSelect($name='sel', $id=null, $class='', $values=array(0=>'zero', 1=>'um', 2=>'dois'), $selected='dois', $attributes=array(0=>'zero',1=>'um', 2=>'dois'));
print "\n<br>".$form->inputRadio('times', $label = 'Times de futebol', $values = ['Ceará', 'Fortaleza', 'Tiradentes'], $id = '', $selected = 'Tiradentes');
print "\n<br>".$form->inputCheckbox('paises', $label = 'Países', $values = ['Brasil', 'EUA', 'África do Sul'], $id = '', $selected = 'África do Sul');
print "\n<br>".$form->formEnd();
