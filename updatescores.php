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
		$scoreA = sanitizeData($_POST['teamAScore']);
		$scoreB = sanitizeData($_POST['teamBScore']);
		$innings = sanitizeData($_POST['innings']);
		echo $scoreA.'-'.$scoreB.'-'.$innings;
		if(is_int($teamAScore)) echo 'true team a';
		if(is_int($teamBScore)) echo 'true team b';
		if(is_int($innings)) echo 'true innings';
		
		if(empty($scoreA) || empty($scoreB) || empty($innings)){
			$error = true;
			$errMSG = "A required field was empty. Enter all required values.";
		}
		
		if($scoreA === $scoreB){
			$error = true;
			$errMSG = "Teams scores cannot be equal.";
			
		}
		if(!is_int($teamAScore) || !is_int($teamBScore) || !is_int($innings)){
			$error = true;
			$errMSG = "Only valid integers are allowed for Scores and Innings.";
			
		}
		if($innings < 9){
			$error = true;
			$errMSG = "Total innings cannot be less than 9.";
			
		}
		
		if(!$error) {
			$query = "INSERT INTO game_schedule(team_A_score,team_B_score,total_innings) VALUES($scoreA,$scoreB,$innings)";
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
				<h4 class="form-signin-heading"><?php echo $_SESSION['teamAScore']; ?></h4>
				<input type="number" min="0" class="form-control" name="teamAScore" id="teamAScore" title="Team A Score" placeholder="Score for <?php echo $_SESSION['teamAScore']; ?>" required autofocus><br>
				<h4 class="form-signin-heading"><?php echo $_SESSION['teamBScore']; ?></h4>
				<input type="number" min="0" class="form-control" name="teamBScore" id="teamBScore" title="Team B Score" placeholder="Score for <?php echo $_SESSION['teamBScore']; ?>" required autofocus><br>
				<h4 class="form-signin-heading">Innings</h4>
				<input type="number" min="9" class="form-control" name="innings" id="innings" title="innings" placeholder="Total Innings" required autofocus><br>
				<?php
				if (!isset($sucMSG)) {
					
					?>
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
