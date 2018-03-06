<?php 
	include("functions.php");
	session_start();
	gatekeeper('Admin');
	require_once 'sqlcon.php';
	
	if(isset($_POST['btn-cancel']) ) {
		header('index.php');
		exit;
	}
	
	if(isset($_POST['btn-edit']) ) {
		if(!empty($_POST['addID'])){
			$query = "select t1.name as 'team a', t2.name as 'team b' from game_schedule g inner join teams t1 on g.team_A_id = t1.id inner join teams t2 on g.team_B_id = t2.id where g.id = '".$_POST['addID']."';";
			$result = $dbh->query($query);
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$rows[] = $row;
			}
			foreach($rows as $row){
				echo $row['team a'];
				echo $row['team b'];
				$_SESSION['teamAScore'] = $row['team a'];
				$_SESSION['teamBScore'] = $row['team b'];
			}
			$_SESSION['matchID'] = $_POST['addID'];
			/* $_SESSION['teamAScore'] = $rows['team a'];
			$_SESSION['teamBScore'] = $rows['team b']; */
			echo $_SESSION['matchID'][0].$_SESSION['teamAScore'][0].$_SESSION['teamBScore'][0];
			//header('Location: updatescores.php');

		}else{
			$error = true;
			$errMSG = 'Please select one match.';
			
		}
		
	}
	
	if(isset($_POST['btn-search']) ) {
		$searchPerformed = true;
		$error = false;
		$searchTerm = ucwords(sanitizeData($_POST['searchbox']));
		
		if(!$error){
			if(empty($searchTerm)){
				$query = "select id, (select name from teams where teams.id = game_schedule.team_A_id) AS 'Team A', (select name from teams where teams.id = game_schedule.team_B_id) AS 'Team B', team_A_score, team_B_score, total_innings, schd_date, schd_time, town from game_schedule;";
				
			}else{
				$query = "select id, (select name from teams where teams.id = game_schedule.team_A_id) AS 'Team A', (select name from teams where teams.id = game_schedule.team_B_id) AS 'Team B', team_A_score, team_B_score, total_innings, schd_date, schd_time, town from game_schedule where (select name from teams where teams.id = game_schedule.team_A_id) like '%$searchTerm%' or (select name from teams where teams.id = game_schedule.team_B_id) like '%$searchTerm%';";
			}
			
				
			$result = $dbh->query($query);
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$rows[] = $row;
			}
			$rowCount = count($rows);
			echo '<div style="margin:auto;width:75%;padding:40px;">';
			echo '<h3 class="form-signin-heading">Matches</h3><br>';
			echo '<form class="form-signin" id="userchoice" role="form" method="post" action="">';
			echo '<table class="table table-striped">';
			echo '<tr>';
			echo '<th scope="col">Select</th>';
			echo '<th scope="col">Team A</th>';
			echo '<th scope="col">Team B</th>';
			echo '<th scope="col">Team A Score</th>';
			echo '<th scope="col">Team B Score</th>';
			echo '<th scope="col">Total Innings</th>';
			echo '<th scope="col">Date</th>';
			echo '<th scope="col">Time</th>';
			echo '<th scope="col">Town</th>';
			echo ' </tr>';
			if($rowCount >= 1){
				foreach($rows as $row){
					echo '<tr>';
					echo '<td scope="row"><input type="radio" name="addID[]" value="'.$row['id'].'"</td>';
					echo '<td scope="row">' . $row['Team A'] . '</td>';
					echo '<td scope="row">' . $row['Team B'] . '</td>';
					echo '<td scope="row">' . $row['team_A_score'] . '</td>';
					echo '<td scope="row">' . $row['team_B_score'] . '</td>';
					echo '<td scope="row">' . $row['total_innings'] . '</td>';
					echo '<td scope="row">' . $row['schd_date'] . '</td>';
					echo '<td scope="row">' . $row['schd_time'] . '</td>';
					echo '<td scope="row">' . $row['town'] . '</td>';
					echo '</tr>';
				}
			
			}else{
				echo '<h4 class="form-signin-heading">No match was found.  Try Again...</h4><br>';
				$searchPerformed = false;
				//header('Refresh: 4; index.php');
				
			}
			echo '</table><br>';
					
					
								
		}
	}
	
	
		
?>




<!DOCTYPE html>
<HTML>
<HEAD>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</HEAD>

<div class="container">
	<div class="row">
    	<div class="container" id="formContainer">

          <form class="form-signin" id="login" role="form" method="post" action="" autocomplete="off">
			<?php
				if ( isset($errMSG) ) {
					
					?>
					<div class="form-group">
					<div class="alert alert-danger">
					<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
					</div>
					</div>
					<?php
				}
			?>
			<?php
				if (isset($sucMSG)) {
					
					?>
					<div class="form-group">
					<div class="alert alert-success">
					<span class="glyphicon glyphicon-ok-sign"></span> <?php echo $sucMSG; ?>
					</div>
					</div>
					<?php
				}
			?>
			<div style="margin:auto;width: 50%;padding: 40px;">
			<?php
				if (isset($searchPerformed) ) {
					?>
					<button class="btn btn-lg btn-primary btn-block" type="edit" name="btn-edit">Edit Selected</button><br><br>
					<?php
				}
			?>
					
				<a href="#" id="flipToRecover" class="flipLink">
				</a>
				
				<?php
				if (isset($searchPerformed) ) {
					
					echo '<br>';
					
				}else{
					echo '<h3 class="form-signin-heading">Enter Match Information</h3><br>';
					echo '<input type="text" class="form-control" name="searchbox" id="searchbox" placeholder="Search schedules by team or press Enter to load all schedules..." autofocus><br>';
					echo '<button class="btn btn-lg btn-primary btn-block" type="search" name="btn-search">Search</button><br><br>';
				}
			?>			
				
				<button class="btn btn-lg btn-danger btn-block" type="button" onclick="window.location.href = 'admin.php' "; name="btn-cancel">Cancel</button>
			</div>
          </form>
    
        </div>
	</div>
</div>
</HTML>


		