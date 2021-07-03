<?php 

include "config.php";

$request = 0;

if(isset($_POST['request'])){
	$request = $_POST['request'];
}

// Fetch state list by countryid
if($request == 1){
	$countryid = $_POST['countryid'];

	$stmt = $conn->prepare("SELECT * FROM states WHERE country=:country ORDER BY name");
	$stmt->bindValue(':country', (int)$countryid, PDO::PARAM_INT);

	$stmt->execute();
	$statesList = $stmt->fetchAll();

	$response = array();
	foreach($statesList as $state){
		$response[] = array(
				"id" => $state['id'],
				"name" => $state['name']
			);
	}

	echo json_encode($response);
	exit;
}

// Fetch city list by stateid
if($request == 2){
	$stateid = $_POST['stateid'];

	$stmt = $conn->prepare("SELECT * FROM cities WHERE state=:state ORDER BY name");
	$stmt->bindValue(':state', (int)$stateid, PDO::PARAM_INT);

	$stmt->execute();
	$statesList = $stmt->fetchAll();

	$response = array();
	foreach($statesList as $state){
		$response[] = array(
				"id" => $state['id'],
				"name" => $state['name']
			);
	}

	echo json_encode($response);
	exit;
}