<?php
	include("functions.php");
	session_start();
	gatekeeper('User');
	require_once 'sqlcon.php';
	ini_set("display_errors", true);
	if(isset($_POST['btn-goback']) ) {
		header("Location: home.php");
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
	$userQuery = "SELECT t1.name AS 'Team A',t2.name AS 'Team B', g.schd_date AS 'Date', g.schd_time AS 'Time', g.town AS 'Location' FROM game_schedule g LEFT JOIN teams t1 ON g.team_A_id = t1.id LEFT JOIN teams t2 ON g.team_B_id = t2.id;";
	$result = $dbh->query($userQuery);
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$rows[] = $row;
	}
	$rowCount = count($row);
	/* foreach($rows as $row){
		echo $row['f_name'] . "<br>";
	} */
	echo '<div style="margin:auto;width:75%;padding:40px;">';
	echo '<h4 class="form-signin-heading">Schedules</h4><br>';
	echo '<form class="form-signin" id="userchoice" role="form" method="post" action="">';
	echo '<button class="btn btn-lg btn-primary btn-block" style="width:20%" type="submit" name="btn-goback">Home</button><br></form>';
	echo '<table class="table table-striped">';
	echo '<tr>';
	echo '<th scope="col">Team A</th>';
	echo '<th scope="col">Team B</th>';
	echo '<th scope="col">Date</th>';
	echo '<th scope="col">Time</th>';
	echo '<th scope="col">Location</th>';
	echo ' </tr>';
	if($row){
		foreach($rows as $row){
			echo '<tr>';
			echo '<td scope="row">' . $row['Team A'] . '</td>';
			echo '<td scope="row">' . $row['Team B'] . '</td>';
			echo '<td scope="row">' . $row['Date'] . '</td>';
			echo '<td scope="row">' . $row['Time'] . '</td>';
			echo '<td scope="row">' . $row['Location'] . '</td>';
			echo '</tr>';
		}
		
	}else{
		echo "No data available.  Redirecting to your homepage...";
		header('Refresh: 4; index.php');
		exit;
		
	}
	echo '</table><br>';
	//echo '<form><button class="btn btn-lg btn-primary btn-block" type="submit" style="width:20%" name="btn-goback">Home</button></form>';
	
?>