<?php


include 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if(!$conn) {
	echo mysql_error();
	http_response_code(500);
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	if(!isset($_POST['user']) or !isset($_POST['pass'])) {
		echo "invalid post recieved";
		http_response_code(400);
		exit("failure");
	} 

	$user_name = $_POST['user'];
	$password = md5($_POST['pass']);

	
	$query = "SELECT user_name FROM Account WHERE Account.hashed_pass = \"{$password}\"";
	$result = mysqli_query($conn, $query);


	if(!$result) {
		echo "query failed";
		http_response_code(500);	
		exit("failure");
	}


	$response = array("value" => false);
	if($row = mysqli_fetch_row($result)) {
		$response["value"] = $row[0] === $user_name;
	} 

	echo json_encode($response);
	http_response_code(200);
}


?>
