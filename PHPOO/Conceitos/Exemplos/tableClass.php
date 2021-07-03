<?php
/**
 * Created on 05/10/2009
 * @author Rogério Oliveira     -   rogeriobav@gmail.com.
 * @todo classe desenvolvida para a
 * instrução de muitos no uso de OO com PHP.
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 * Adaptação de Ribamar FS - https://ribafs.org
 */
 
class Table{
    function tableCreate($class='table table-hover table-stripped', $border='1', $align="center") {
        return "<table class=\"$class\" border=\"$border\" align=\"$align\">\n";
    }

    function tableTrOpen() {
        return "<tr>\n";
    }
     
    public function tableTd($nr=1, $class='', $colspan='', $rowspan='', $content='Teste', $align="center"){
        $td='';
        for($x=1;$x<=$nr;$x++){
            $td .="<td class=\"$class\" colspan=\"$colspan\" rowspan=\"$rowspan\" align=\"center\">$content</td>\n";
        }
        return $td;
    }

    function tableTdOpen($class='', $colspan='', $rowspan='', $content='Teste', $align="center") {
        return "<td class=\"$class\" colspan=\"$colspan\" rowspan=\"$rowspan\" align=\"center\">$content\n";
    }

    function tableTrClose() {
        return "</tr>\n";
    }

    function tableClose(){
        return "</table>\n";
    }
}

$tbl = new Table();
print $tbl->tableCreate();

print $tbl->tableTrOpen();
print $tbl->tableTd($nr=8);
print $tbl->tableTrClose();

print $tbl->tableTrOpen();
print $tbl->tableTdOpen(3,'',$colspan='3');
print $tbl->tableTrClose();

print $tbl->tableClose();
?>
