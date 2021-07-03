<?php
/**
 * Created on 05/10/2009
 * @author Rogério Oliveira     -   rogeriobav@gmail.com.
 * @todo classe desenvolvida para a
 * instrução de muitos no uso de OO com PHP.
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 */
 
class Form{
    function formCreate($method='POST', $action='') {
        return "<form method='$method' action='$action' />
        <table><br>\n";
    }
     
    /**
     * @author Rogério Oliveira     -   rogeriobav@gmail.com.
     * @param: $nome                -   nome do campo.
     * @param: $valores     string  -   valor digitado ou valor encontrado através da busca.
     */     
    function inputText($nome,$valor='') {
        return '<tr><td>'.ucfirst($nome)."</td><td><input type='text' id='$nome' name='$nome' value='$valor' /></td></tr>";
    }

    function inputTel($nome,$valor='') {
        return '<tr><td>'.ucfirst($nome)."</td><td><input type='te' id='$nome' name='$nome' value='$valor' /></td></tr>";
    }

    function inputEmail($nome,$valor='') {
        return '<tr><td>'.ucfirst($nome)."</td><td><input type='email' id='$nome' name='$nome' value='$valor' /></td></tr>";
    }
     
    /**
     * @author Rogério Oliveira     -   rogeriobav@gmail.com.
     * @param: $nome                -   nome do campo.
     * @param: $valores             -   array de valores; esse por sua vez deve ser unidimensional.
     * @param: $selecionado         -   opção que retorna o valor atual gravado no banco.
     */     
    function inputSelect($nome,$valores,$selecionado=null) {
     
        foreach($valores as $key=>$valor){
            if($key == $selecionado) $select .="<option value='$key' selected='selected' >".$valor."</option></td></tr>";
            else                     $select .="<option value='$key' >".$valor."</option><br>\n";
        }
     
        $select = '<tr><td>'.ucfirst($nome)."</td><td><select id='$nome' name='$nome'>$select</select></td></tr>";     
        return  $select;     
    }
     
    /**
     * @author Rogério Oliveira     -   rogeriobav@gmail.com.
     * @param: $name                -   nome do campo.
     * @param: $values              -   array de valores; esse por sua vez deve ser unidimensional.
     * @param: $check               -   opção que retorna o valor atual gravado no banco.
     * @param: $separation          -   Aqui podemos utlizar o '<br />' caso necessite de quebra de linha.
     */
     function inputRadio($name,$values,$checked,$separation=null) {
     
        foreach($values as $key=>$valor){
            if($key == $checked) {
                $radio .='<tr><td>'.ucfirst($nome)."</td><td><label><input type='radio' name='$name' value='$key' checked />$valor</label>$separation<</td></tr>";
            }else{
                $radio .='<tr><td>'.ucfirst($nome)."</td><td><label><input type='radio' name='$name' value='$key' />$valor</label>$separation</td></tr>";
            }     
            return $radio;
        }
    }

    function submit($valor='Enviar') {
        return "<tr><td></td><td><input type='submit' id='submit' value='$valor' /></td></tr>";
    }

    function formEnd() {
        return "</form></table>"; 
    }
 
}

$form = new Form();
print $form->formCreate();
print $form->inputText('nome',$valor='');
print $form->inputTel('telefone',$valor='');
print $form->inputEmail('email');
print $form->submit();
print $form->formEnd();
?>
