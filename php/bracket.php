<?php

include 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(!$conn) {
	echo mysqli_error();
	http_response_code(500);
}

if($_SERVER['REQUEST_METHOD'] === 'GET') {

	if(!isset($_GET['tourney'])) {
		echo "invalid post recieved";
		http_response_code(400);
		exit("failure");
	}	

	$tournament_id = $_GET['tourney'];

	$query = "SELECT * FROM `Match` WHERE `Match`.`tournament_id` = {$tournament_id}";
	$result = mysqli_query($conn, $query);

	if(!$result) {
		echo "query failed";
		http_response_code(500);	
	} else {

		$response_data = array();

		while($row = mysqli_fetch_assoc($result)) {
			array_push($response_data, $row);
		}

		echo json_encode($response_data);
		http_response_code(200);
	}
}

?>
