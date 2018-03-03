<?php 
	include("functions.php");
	session_start();
	gatekeeper('Admin');
	require_once 'sqlcon.php';
	ini_set("display_errors", true);
	if(isset($_POST['btn-cancel']) ) {
		header('index.php');
		exit;
	}
	
	if(isset($_POST['btn-submit-addplayer']) ) {
		$error = false;
		$tname = ucwords(sanitizeData($_POST['tname']));
		$abbrv = strtoupper(sanitizeData($_POST['abbrv']));
		$gplayed = sanitizeData($_POST['gplayed']);
		$gwon = sanitizeData($_POST['gwon']);
		$glost = sanitizeData($_POST['glost']);
		
		if(empty($tname) || empty($abbrv) || empty($gplayed) || empty($gwon) || empty($glost)){
			$error = true;
			$errMSG = "A required field was empty. Enter all required values.";
			
		}
		
		if(!ctype_alpha(str_replace(' ', '', $tname))) {
			$error = true;
			$errMSG = 'Team Name must only contain letters and spaces.';
			
		}
		
		if(mb_strlen($abbrv, 'utf8') > 2) {
			$error = true;
			$errMSG = 'Abbreviation must be only two letters.';
			
		}
		
		if(!is_int($gplayed) || !is_int($gwon) || !is_int($glost)) {
			$error = true;
			$errMSG = 'Games Played, Won and Lost must be a valid integer.';
			
		}
		
		if($gplayed < 0 || $gwon < 0 || $glost < 0) {
			$error = true;
			$errMSG = 'Games Played, Won and Lost must be a positive integer.';
			
		}
		
		if($gwon + $glost !== $gplayed){
			$error = true;
			$errMSG = 'Games won and games lost must add up to total games played.';
			
		}
		
		
		
		if(!$error) {
			$query = "INSERT INTO teams(name,abbreviation,games_played,games_won,games_lost) VALUES('$name','$abbreviation','$games_played','$games_won','$games_lost')";
			
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
<!------ Include the above in your HEAD tag ---------->
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
				<h3 class="form-signin-heading">Enter Player Information</h3><br>
				<a href="#" id="flipToRecover" class="flipLink">
				</a>
				<input type="text" class="form-control" name="tname" id="tname" placeholder="Team Name" required autofocus><br>
				<input type="text" class="form-control" name="abbrv" id="abbrv" pattern="[A-Za-z]{2}" title="Enter a two letter Abbreviation" placeholder="Abbreviation" required autofocus><br>
				<input type="number" min="0" class="form-control" name="gplayed" id="gplayed" title="Games Played" placeholder="Number of Games Played" required autofocus><br>
				<input type="number" min="0" class="form-control" name="gwon" id="gwon" title="Games Won" placeholder="Games Won" required autofocus><br>
				<input type="number" min="0" class="form-control" name="glost" id="glost" title="Games Lost" placeholder="Games Lost" required autofocus><br>
				
			
				
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-submit-addplayer">Submit</button><br><br>
				<button class="btn btn-lg btn-danger btn-block" type="button" onclick="window.location.href = 'admin.php' "; name="btn-cancel">Cancel</button>
			</div>
          </form>
    
        </div> <!-- /container -->
	</div>
</div>
</HTML>
