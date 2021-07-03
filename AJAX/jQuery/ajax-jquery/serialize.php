<?php
if( $_REQUEST["name"] ) {

   $name = $_REQUEST['name'];
   echo "Welcome ". $name;
   $age = $_REQUEST['age'];
   echo "<br />Your age : ". $age;
   $sex = $_REQUEST['sex'];
   echo "<br />Your gender : ". $sex;
}
?>
