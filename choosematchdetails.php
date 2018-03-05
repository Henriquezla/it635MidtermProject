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
		$query = "INSERT INTO game_schedule(team_A_id,team_B_id,schd_date,schd_time,town) VALUES('$teamA','$teamB','$matchdate','$matchtime','$town')";
		$result = $dbh->query($query);
		if(!$result){
			$error = true;
			$errMSG = mysqli_error($dbh);
				
		}else{
			$error = false;
			$sucMSG = "Match added.";
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
