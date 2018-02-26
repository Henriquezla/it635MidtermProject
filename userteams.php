<?php
	include("functions.php");
	session_start();
	gatekeeper('User');
	require_once 'sqlcon.php';
	ini_set("display_errors", true);
	if(isset($_POST['btn-logout']) ) {
		header("Location: logout.php");
	}
?>
	
	
<!DOCTYPE html>
<HTML>
<HEAD>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
</HEAD>
	
	
	
<?php
	$row = array();
	$userQuery = "SELECT * FROM teams LIMIT 0,10";
	$result = $dbh->query($userQuery);
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$rows[] = $row;
	}
	$rowCount = count($row);
	/* foreach($rows as $row){
		echo $row['f_name'] . "<br>";
	} */
	echo '<div style="margin:auto;width:75%;padding:40px;">';
	echo '<table class="table table-striped">';
	echo '<tr>';
	echo '<th scope="col">Team ID</th>';
	echo '<th scope="col">Team Name</th>';
	echo '<th scope="col">Abbreviation</th>';
	echo '<th scope="col">Games Played</th>';
	echo '<th scope="col">Games Won</th>';
	echo '<th scope="col">Games Lost</th>';
	echo ' </tr>';
	foreach($rows as $row){
		echo '<tr>';
		echo '<td scope="row"><b>' . $row['id'] . '</b></td>';
		echo '<td scope="row">' . $row['name'] . '</td>';
		echo '<td scope="row">' . $row['abbreviation'] . '</td>';
		echo '<td scope="row">' . $row['games_played'] . '</td>';
		echo '<td scope="row">' . $row['games_won'] . '</td>';
		echo '<td scope="row">' . $row['games_lost'] . '</td>';
		echo '</tr>';
	
	}
	echo '</table>';
	
?>