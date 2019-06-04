<?php

include 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if(!$conn) {
	echo mysql_error();
	http_response_code(500);
} 


if($_SERVER['REQUEST_METHOD'] === 'GET') {

	$query = "SELECT * From TestTable";

	$result = mysqli_query($conn, $query);


	if(!$result) {
		echo "result failed";
		http_response_code(500);	
	} else {
	
		$response_data = array();
		
		while($row = mysqli_fetch_assoc($result)) {
			array_push($response_data, $row);	
		}

		echo json_encode($response_data);
		http_reponse_code(200);
	}
}


?>
