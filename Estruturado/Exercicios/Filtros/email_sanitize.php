<?php

/*** an email address ***/
$email = "kevin&friends@(foo).ex\\ample.com";

/*** sanitize the email address ***/
echo filter_var($email, FILTER_SANITIZE_EMAIL);

?>
