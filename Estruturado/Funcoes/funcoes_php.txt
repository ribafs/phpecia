<?php

/*  CHECK IF A $STRING IS INT. */
function isNumeric($string){
	if (!filter_var($string, FILTER_VALIDATE_INT)) 
        return false;
    else
        return true;
}

/*  CHECK IF A $STRING IS FLOAT. */
function isFloat($string){
	if (!filter_var($string, FILTER_VALIDATE_FLOAT)) 
        return false;
    else
        return true;
}

/*  CHECK IF A $STRING IS BOOLEAN. */
function isBoolean($string){
	if (!filter_var($string, FILTER_VALIDATE_BOOLEAN)) 
        return false;
    else
        return true;
}

/* CHECK IF A VALID IP */
function isValidIP($string) {
    if (!filter_var($string, FILTER_VALIDATE_IP)) 
        return false;
    else
        return true;
}

/*  CHECK IF A VALID URL */
function isValidUrl($string) {
    if (!filter_var($string, FILTER_VALIDATE_URL)) 
        return false;
    else
        return true;
}

/*  CHECK IF A VALID EMAIL */
function isValidEmail($string) {
    if (!filter_var($string, FILTER_VALIDATE_EMAIL)) 
        return false;
    else
        return true;
}

/*  CHECK IF A $STRING IS EQUAL TO OTHER */
function isEqual($string1, $string2){
    if ($string2 != $string1)
        return false;
    else
        return true;
}

/*  CHECK IF A $STRING IS VALIDATE NAMES WITHOUT NUMBERS BUT WITH ~, ^. */
function isValidName($string){
    if (!preg_match('/^[A-ZÀ-Ÿ][A-zÀ-ÿ\'.]+\s([A-zÀ-ÿ\'.]\s?)*[A-ZÀ-Ÿ.][A-zÀ-ÿ\'.]+$/', $string))
        return false;
    else
        return true;
}

/*  IS A DINAMIC FUNCTION, GET THE SIZE OF STRING AND IF IS BIGGER THAN 7, APPLY THE MOST 
RULES FOR SECURE PASSWORD. MINIMUM 8 CHARACTER, AT LAST 1 ESPECIAL, 1 UPPER C. AND 1 LOWER. */
function isSecurePass($string){
	if (strlen($string) > 7)
		if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{'.strlen($string).'}$/', $string)) 
			return false;
		else 
			return true;
	else
		return false;
}

function isPrice($string){
	if (!preg_match('/^([1-9]\d{0,2})?(\.\d{3})*,\d{2}$/', $string))
        return false;
    else
        return true;
}

/*  CHECK IF A $STRING IS CPF OF CPNJ WITH OR WITHOUT PONTUATION */
function isValidCPForCNPJ($string){
    if (!preg_match('/^([0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}|[0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\/?[0-9]{4}\-?[0-9]{2})$/', $string))
        return false;
    else
        return true;
}

/*  CHECK IF A $STRING IS CPF OF CPNJ WITH OR WITHOUT PONTUATION */
function isValidChave($string){
  if (!preg_match('/^([0-9]{4}\-[0-9]{4}\-[0-9]{4}\-[0-9]{4})$/', $string))
    return false;
  else
    return true;
}

/*  CHECK IF A $STRING IS A DATE 03/06/1989 */
function isDate($string){
    if (!preg_match('/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/', $string))
      return false;
    else
      return true;
}


function isCPForCNPJ($string){
    $string = preg_replace('/[^0-9]/', '', $valor);
    if (strlen($string) == 11)
    {
        $result->cpf = $valor;
    }
    elseif (strlen($string) == 14)
    {
        $result->cnpj = $valor;
    }
}

/* CHECK IF IS A SLUG LIKE-THIS-BECAUSE-IS-A-NEED */
function isValidSlug($string){
	if (!preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $string)) 
		return false;
	else
		return true;
}

/*  CHECK IF A $STRING IS A KEY VALID WITH 40 CHARACTERS */
function isValidKey($string) {
    $string = strip_tags($string);
    if(strlen($string) != 40 AND !preg_match("/^.[a-z0-9]+$/", $string))
      return false;
    else
      return true;
}

/*  CHECK IF A FLOAT NUMBER BETTEN 1 AND 5 WITH 0.5 INTERVALS */
function isValidAvaliateStar($string){
    if (!preg_match('/^[1,2,3,4,5]{1}\.[0|5]{1}$/', $string))
        return false;
    else
        return true;
}

/* 
    VALID THE DATE
    2017-01-01T00:00:00+0000
    2017-01-01 00:00:00+00:00
    2017-01-01T00:00:00+00:00
    2017-01-01 00:00:00+0000
    2017-01-01

*/

function isValidDate($string){
    if (!preg_match('/^(19[0-9]{2}|2[0-9]{3})\-(0[1-9]|1[0-2])\-(0[1-9]|1[0-9]|2[0-9]|3[0-1])((T|\s)(0[0-9]{1}|1[0-9]{1}|2[0-3]{1})\:(0[0-9]{1}|1[0-9]{1}|2[0-9]{1}|3[0-9]{1}|4[0-9]{1}|5[0-9]{1})\:(0[0-9]{1}|1[0-9]{1}|2[0-9]{1}|3[0-9]{1}|4[0-9]{1}|5[0-9]{1})((\+|\.)[\d+]{4,8})?)?$/', $string))
        return false;
    else
        return true;
}

function isValidCredCard($string) {
    // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
    $string=preg_replace('/\D/', '', $string);
  
    // Set the string length and parity
    $number_length=strlen($string);
    $parity=$number_length % 2;
  
    // Loop through each digit and do the maths
    $total=0;
    for ($i=0; $i<$number_length; $i++) {
      $digit=$string[$i];
      // Multiply alternate digits by two
      if ($i % 2 == $parity) {
        $digit*=2;
        // If the sum is two digits, add them together (in effect)
        if ($digit > 9) {
          $digit-=9;
        }
      }
      // Total up the digits
      $total+=$digit;
    }

    // If the total mod 10 equals 0, the number is valid
    return ($total % 10 == 0) ? TRUE : FALSE;
}

/*

Take many time to request

function isPossibleEmail($email) {
    $mail = (explode("@", $email));
    $site = 'http://www.'.$mail[1];
    $cURL = curl_init($site);
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURL, CURLOPT_FOLLOWLOCATION, true);
    $resultado = curl_exec($cURL);
    $resposta = curl_getinfo($cURL, CURLINFO_HTTP_CODE);
    curl_close($cURL);
    return $resposta;
}
//https://gist.github.com/caironm/1217697b57216cef43e00cb8a2f4ed13?fbclid=IwAR3VLoA06rn8pst4xXi_d21mQY_oyFpKg8quxOiJCDkfA0ZyXfU3Wu0Httc 
*/
