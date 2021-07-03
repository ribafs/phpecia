<?php

function date_br($date_en){
    $dateBR = implode( '/', array_reverse( explode( '-', $date_en ) ) );
     
    return $dateBR;
}

print date_br('2020-03-14');
