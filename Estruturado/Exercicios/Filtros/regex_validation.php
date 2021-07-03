<?php

/*** an email address ***/
$email = "ribafs@gmail.com";

/*** the pattern we wish to match against ***/
$pattern = "/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU";

/*** try to validate with the regex pattern ***/
if(filter_var($email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$pattern))) === false)
        {
        /*** if there is no match ***/
        echo "Sorry, no match";
        }
else
        {
        /*** if we match the pattern ***/ 
        echo "The email $email address is valid";
        }
?>
