<?php
class ParentClass
{
}

class ChildClass extends ParentClass
{
}

$cc = new ChildClass();
if (is_a($cc,"ChildClass")) echo "It's a ChildClass Type Object<br>";

if (is_a($cc,"ParentClass")) echo "It's also a ParentClass Type Object";
?>
