<?php
function is_validEmail($email)
{
        $check = 0;
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $check = 1;
        }
        return $check;
}
