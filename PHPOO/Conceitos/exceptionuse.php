<?php
//class.db.php
error_reporting(E_ALL - E_WARNING);
class db
{
	function connect()
	{
		if (!pg_connect("host=localhost password=pass user=username dbname=db")) 
			throw new Exception("Cannot connect to the database");
	}
}

	$db = new db();
	try {
		$db->connect();
	}
	catch (Exception $e)
	{
		print_r($e);
	}
?>
