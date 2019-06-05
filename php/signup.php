<?php
include 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(!$conn) {
	echo mysqli_error();
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

	$query = "INSERT INTO `Account` (user_name, hashed_pass) VALUES (\"{$user_name}\", \"{$password}\")";
	$result = mysqli_query($conn, $query);

	$response = array("value" => false);
	if($result) {
		$response["value"] = true;
	} 

	echo json_encode($response);
	http_response_code(200);


}
?>
