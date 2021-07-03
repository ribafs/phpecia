<?php
/**
 *
 * @Check if number is greater than 3
 *
 * @param int
 *
 * @return bool on success
 *
 */
function checkNum($number){
	if($number > 3){
		throw new Exception("Number is greater than 3");
    }
	return true;
}

/*** try block ***/
try{
    checkNum(28);
    /*** this code does not get excecuted if an exception is thrown ***/
    echo 'If you see this, the number is not greater than 3';
}
/*** catch the exception here ***/
catch(Exception $e){
    // code to handle the Exception
    echo 'Catch exception here<br />';
    echo 'Message: '   .$e->getMessage().'<br />';
    echo 'More text or functions here.';
}
?>

<?php

/*** an invalid email address ***/
$email = "example@phpro@org";
try    {
    /*** check the validity of the email address ***/
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
        {
        /*** if there is a problem, throw an exception ***/
        throw new customException($email);
        }
    }
catch (customException $e)
    {
    /*** display the custom error message ***/
    echo "<p style='color: red'>".$e->errorMessage()."</p>";
    }

/*** the custome excetpion class ***/
class customException extends Exception {
/**
 *
 * @return exception message 
 *
 * @access public
 *
 * @return string
 *
 */
public function errorMessage(){
 /*** the error message ***/
 $errorMsg = 'The email Address '.$this->getMessage().', on line '.
 $this->getLine().' in '.$this->getFile().', is invalid.';
 /*** return the error message ***/
 return $errorMsg;
}

} /*** end of class ***/
// Introduction to PHP Exceptions By Kevin Waterson - phppro.org
?>
