<?php

/*** an email address ***/
$email = "kevin@foo.bar.net";

/*** try to validate the email ***/
if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
        {
    /*** if it fails validation ***/
        echo "$email is invalid";
        }
else
        {
    /*** if the address passes validation ***/
        echo "$email is valid";
        }
?>
