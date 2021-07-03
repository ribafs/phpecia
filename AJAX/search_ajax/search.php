<?php
// create a new function
function search($text){
	
	// connection to the Ddatabase
	$db = new PDO("mysql:host=localhost;dbname=testes", 'root', 'root');
	// let's filter the data that comes in
	$text = htmlspecialchars($text);
	// prepare the mysql query to select the users 
	$get_name = $db->prepare("SELECT name FROM users WHERE name LIKE concat('%', :name, '%')");
	// execute the query
	$get_name -> execute(array('name' => $text));
	// show the users on the page
	while($names = $get_name->fetch(PDO::FETCH_ASSOC)){
		// show each user as a link
		echo '<a href="">'.$names['name'].'</a>';
		
	}
}
// call the search function with the data sent from Ajax
search($_GET['txt']);
?>

