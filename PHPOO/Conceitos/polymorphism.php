<?php
include("class.emailer.php");
include("class.extendedemailer.php");
include("class.htmlemailer.php");
$emailer = new Emailer("hasin@somewherein.net");
$extendedemailer = new ExtendedEmailer();
$htmlemailer = new HtmlEmailer("hasin@somewherein.net");
if ($extendedemailer instanceof emailer ) echo "Extended Emailer is Derived from Emailer.<br/>";
if ($htmlemailer instanceof emailer ) echo "HTML Emailer is also Derived from Emailer.<br/>";
if ($emailer instanceof htmlEmailer ) echo "Emailer is Derived from HTMLEmailer.<br/>";
if ($htmlemailer instanceof extendedEmailer ) echo "HTML Emailer is Derived from Emailer.<br/>";
?>
