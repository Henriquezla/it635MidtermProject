<?php
	include("functions.php");
	session_start();
	gatekeeper('User');
	require_once 'sqlcon.php';
	ini_set("display_errors", true);
	if(isset($_POST['btn-logout']) ) {
		header("Location: logout.php");
	}
	$row = array();
	$userQuery = "SELECT * FROM teams";
	$result = $dbh->query($userQuery);
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$rows[] = $row;
	}
	$rowCount = count($row);
	/* foreach($rows as $row){
		echo $row['f_name'] . "<br>";
	} */
	echo '<table class="table">';
	echo '<tr>';
	echo '<th>Team ID</th>';
	echo '<th>Team Name</th>';
	echo '<th>Abbreviation</th>';
	echo '<th>Games Played</th>';
	echo '<th>Games Won</th>';
	echo '<th>Games Lost</th>';
	echo ' </tr>';
	foreach($rows as $row){
		echo '<tr>';
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['name'] . '</td>';
		echo '<td>' . $row['abbreviation'] . '</td>';
		echo '<td>' . $row['games_played'] . '</td>';
		echo '<td>' . $row['games_won'] . '</td>';
		echo '<td>' . $row['games_lost'] . '</td>';
		echo '</tr>';
	
	}
	echo '</table>';
?>