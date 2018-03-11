<?php 
	include("functions.php");
	session_start();
	gatekeeper('Admin');
	require_once 'sqlcon.php';
	
	if(isset($_POST['btn-cancel']) ) {
		header('index.php');
		exit;
	}
	
	if(isset($_POST['btn-submit-editscore']) ) {
		$error = false;
		$scoreA = intval(sanitizeData($_POST['teamAScore']));
		$scoreB = intval(sanitizeData($_POST['teamBScore']));
		$innings = intval(sanitizeData($_POST['innings']));
			
		if($scoreA === $scoreB){
			$error = true;
			$errMSG = "Teams scores cannot be equal.";
			
		}
		if(!is_int($scoreA) || !is_int($scoreB) || !is_int($innings)){
			$error = true;
			$errMSG = "Only valid integers are allowed for Scores and Innings.";
			
		}
		if($innings < 9){
			$error = true;
			$errMSG = "Total innings cannot be less than 9.";
			
		}
		
		if(!$error && $_SESSION["state"] === 'Admin') {
			$query = "UPDATE game_schedule set team_A_score=$scoreA,team_B_score=$scoreB,total_innings=$innings where id='".$_SESSION['matchID'][0]."'";
			$result = $dbh->query($query);
			$row = array();
			if(!$result){
				$error = true;
				$errMSG = mysqli_error($dbh);
				
			}else{
				$error = false;
				$sucMSG = "Record saved.";
			}
							
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
				<h3 class="form-signin-heading">Enter Scores</h3><br>
				<a href="#" id="flipToRecover" class="flipLink">
				</a>

				<?php
				if (!isset($sucMSG)) {
					
					?>
				<h4 class="form-signin-heading"><?php echo $_SESSION['teamAScore']; ?></h4>
				<input type="number" min="0" class="form-control" name="teamAScore" id="teamAScore" title="Team A Score" placeholder="Score for <?php echo $_SESSION['teamAScore']; ?>" required autofocus><br>
				<h4 class="form-signin-heading"><?php echo $_SESSION['teamBScore']; ?></h4>
				<input type="number" min="0" class="form-control" name="teamBScore" id="teamBScore" title="Team B Score" placeholder="Score for <?php echo $_SESSION['teamBScore']; ?>" required autofocus><br>
				<h4 class="form-signin-heading">Innings</h4>
				<input type="number" min="9" class="form-control" name="innings" id="innings" title="innings" placeholder="Total Innings" required autofocus><br>
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-submit-editscore">Submit</button><br><br>
					<?php
					}
				?>
				<button class="btn btn-lg btn-danger btn-block" type="button" onclick="window.location.href = 'admin.php' "; name="btn-cancel">Cancel/Go Home</button>
			</div>
          </form>
    
        </div>
	</div>
</div>
</HTML>
