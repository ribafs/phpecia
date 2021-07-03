<table>
<tr><td>Nome do filtro</td><td>ID do filtro</td></td>
<?php
	foreach(filter_list() as $id=>$filter){
		echo '<tr><td>'.$filter.'</td><td>'.filter_id($filter).'</td></td>';
	}
?>
</table>
