<?php

/*** a string with tags ***/
$string = "<script>foo</script>";

/*** sanitize the string ***/
echo filter_var($string, FILTER_SANITIZE_STRING);
// Limpa as tags, deixa somente foo
?>

