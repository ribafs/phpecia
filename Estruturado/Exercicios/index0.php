<body bgcolor='#FFFACD'>
<fieldset>
<legend><b>Canivete Suiço</b> - <?php print __FILE__; ?></legend>
<?php
$dn = opendir (dirname(__FILE__));

while ($file = readdir ($dn)) {
if ($file == '.' || $file =='..'){
//print "<a href=$file>$file</a><br>";
}else{
print "<a href=$file>$file</a><br>";
}
}
closedir($dn);
?>
</fieldset>