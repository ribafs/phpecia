<?php

$markers = json_decode($_POST['markers']);

print '<table border="1">';
print '<tr><td><b>Evento</td><td><b>Calendário</td><td><b>Cor</tdr></tr>';
foreach($markers as $marker){
print '<tr><td>'.$marker->eventName.'</td><td>'.$marker->calendar.'</td><td>'.$marker->color.'</tdr></tr>';
}
