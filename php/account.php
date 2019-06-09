<?php


include 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if(!$conn) {
	echo mysql_error();
	http_response_code(500);
}

if($_SERVER['REQUEST_METHOD'] === 'GET') {
	
	if(!isset($_GET['user'])) {
		echo "invalid post recieved";
		http_response_code(400);
		exit("failure");
	} 

	$user_name = $_GET['user'];

	
	$games_won = "SELECT COUNT(id) FROM `Match` WHERE `Match`.victor = \"{$user_name}\"";
	$result = mysqli_query($conn, $games_won);

	$response = array(
		"games_won" => 0,
		"tournaments_played" => 0,
		"tournaments_won" => 0
	);

	if(!$result) {
		echo "query failed";
		http_response_code(500);	
		exit("failure");
	}

	if($row = mysqli_fetch_row($result)) {
		$response["games_won"] = $row[0];
	} 


	$tourney_count = "SELECT COUNT(T.tid) FROM Participant P, Tournament T WHERE P.participant_name = \"{$user_name}\" AND T.tid = P.tournament_id";
	$result = mysqli_query($conn, $tourney_count);

	if($row = mysqli_fetch_row($result)) {
		$response["tournaments_played"] = $row[0];
	} 


	$tourney_victory = "SELECT COUNT(M.id) FROM `Match` M, Tournament T
		WHERE 	M.victor = \"{$user_name}\" AND
				M.tournament_id = T.tid AND
						M.round = (SELECT MAX(M1.round) FROM `Match` M1 WHERE M1.tournament_id = T.tid)";

	$result = mysqli_query($conn, $tourney_victory);

	if($row = mysqli_fetch_row($result)) {
		$response["tournaments_won"] = $row[0];
	} 

	echo json_encode($response);
	http_response_code(200);
}


?>
