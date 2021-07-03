<?php

//Funcao para retornar a extensao de um arquivo
function show_extension($file){
 if(is_file($file)){
   $fileInfo = pathinfo($file);
   $extension=$fileInfo["extension"];
} else {
   $extension="";   
 }
 return $extension;
}


