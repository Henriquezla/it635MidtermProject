<?php 
	include("functions.php");
	session_start();
	gatekeeper('Admin');
	require_once 'sqlcon.php';
	
	if(isset($_POST['btn-cancel']) ) {
		header('index.php');
		exit;
	}
	
	if(isset($_POST['btn-submit-addmatch']) ) {
		$teamA = $_SESSION['teamID'][0];
		$teamB = $_SESSION['teamID'][1];
		$town = ucwords(sanitizeData($_POST['town']));
		$matchdate = sanitizeData($_POST['matchdate']);
		$matchtime = sanitizeData($_POST['matchtime']);
		//$query = "INSERT INTO game_schedule(team_A_id,team_B_id,schd_date,schd_time,town) VALUES('$teamA','$teamB','$matchdate','$matchtime','$town
		//This alternate query inserts a new match ONLY if both teams are NOT scheduled in the same date, against any other team.
		//Using this query avoids having to use a stored procedure for this purpose:
		$query = "INSERT INTO game_schedule (team_A_id,team_B_id,schd_date,schd_time,town) SELECT $teamA,$teamB,'$matchdate','$matchtime','$town' FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM game_schedule WHERE (team_A_id = $teamA AND schd_date='$matchdate') OR (team_B_id = $teamB AND schd_date='$matchdate') OR (team_A_id = $teamB AND schd_date='$matchdate') OR (team_B_id = $teamA AND schd_date='$matchdate'));";
		echo $teamA.'<br>';
		echo $teamB.'<br>';
		echo $matchdate.'<br>';
		echo $matchtime.'<br>';
		echo $town.'<br>';
		$result = $dbh->query($query);
		$affectedRows = $dbh->query("SELECT row_count()");
		$rowAffectedRows = $affectedRows->fetch_array(MYSQLI_ASSOC);
		$numAffectedRows = intval($rowAffectedRows['row_count()']);
		echo $numAffectedRows;
		if(!$result || $numAffectedRows < 1){
			$error = true;
			if(empty(mysqli_error($dbh))){
				$errMSG = "One of the teams is already scheduled for that date. Please change the date.";
			}else{
				$errMSG = mysqli_error($dbh);
			}
			
		}else{
			$error = false;
			$sucMSG = "Match added.";			
			unset($_SESSION['teamID']);
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
				<h3 class="form-signin-heading">Enter Match Details</h3><br>
				<a href="#" id="flipToRecover" class="flipLink">
				</a>
				<input type="text" class="form-control" name="town" id="town" placeholder="Town where match will take place" required autofocus><br>
				<input type="date" class="form-control" name="matchdate" id="matchdate" placeholder="Date of the match" required><br>
				<input type="time" class="form-control" name="matchtime" id="matchtime" value="17:00:00"><br><br>
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-submit-addmatch">Submit</button><br><br>
				<button class="btn btn-lg btn-danger btn-block" type="button" onclick="window.location.href = 'admin.php' "; name="btn-cancel">Cancel</button>
			</div>
          </form>
    
        </div>
	</div>
</div>
</HTML>
