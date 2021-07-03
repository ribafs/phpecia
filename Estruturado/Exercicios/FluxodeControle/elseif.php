<?php
$a = 3;
$b = 3;
if ($a > $b){
   echo "a é maior que b";
} elseif ($a==$b){
   echo "a é igual a b";   
} else {
   echo "a NÃO é maior que b nem igual a b";
}
?>

// Sintaxe alternativa
<?php
if ($condition):
    do_something();
elseif ($another_condition):
    do_something_else();
else:
    do_something_different();
endif;
?>

<?php if ($condition): ?>
    <p>Do something in HTML</p>
<?php elseif ($another_condition): ?>
    <p>Do something else in HTML</p>
<?php else: ?>
    <p>Do something different in HTML</p>
<?php endif; ?>

<?php
$i = 1048;
switch (true) {
case ($i > 0):
    echo "more than 0";
    break;

    case ($i > 100):
    echo "more than 100";
    break;

    case ($i > 1000):
    echo "more than 1000";
    break;
}
