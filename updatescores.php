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
		$fname = ucwords(sanitizeData($_POST['fname']));
		$minitial = strtoupper(sanitizeData($_POST['minitial']));
		$lname = ucwords(sanitizeData($_POST['lname']));
		$dob = sanitizeData($_POST['dob']);
		$country = strtoupper(sanitizeData($_POST['country']));
		$throwsbats = strtoupper(sanitizeData($_POST['throwsbats']));
		
		if(empty($fname) || empty($lname) || empty($dob) || empty($country) || empty($throwsbats)){
			$error = true;
			$errMSG = "A required field was empty. Enter all required values.";
			

		}
		
		if(!ctype_alpha(str_replace(' ', '', $fname))) {
			$error = true;
			$errMSG = 'First Name must only contain letters and spaces.';
			
		}
		
		if(!ctype_alpha(str_replace(' ', '', $lname))) {
			$error = true;
			$errMSG = 'Last Name must only contain letters and spaces.';
			
		}
		
		if(mb_strlen($minitial, 'utf8') > 1) {
			$error = true;
			$errMSG = 'Middle Name initial should only be one letter.';
			
		}
		
		if(mb_strlen($country, 'utf8') > 2) {
			$error = true;
			$errMSG = 'Country code must be two letters.';
			
		}
		
		if(mb_strlen($throwsbats, 'utf8') > 1) {
			$error = true;
			$errMSG = 'Throws/Bats code must be one letter.';
			
		}
		
		if(!$error) {
			if(empty($minitial)){
				$query = "INSERT INTO players(f_name,l_name,dob,country,bats_throws) VALUES('$fname','$lname','$dob','$country','$throwsbats')";			
			}else{
				$query = "INSERT INTO players(f_name,m_initial,l_name,dob,country,bats_throws) VALUES('$fname','$minitial','$lname','$dob','$country','$throwsbats')";
			}
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
				<h5 class="form-signin-heading"><?php echo $_SESSION['teamAScore']; ?></h5>
				<input type="number" min="0" class="form-control" name="teamAScore" id="teamAScore" title="Team A Score" placeholder="Score for <?php echo $_SESSION['teamAScore']; ?>" required autofocus><br>
				<h5 class="form-signin-heading"><?php echo $_SESSION['teamBScore']; ?></h5>
				<input type="number" min="0" class="form-control" name="teamBScore" id="teamBScore" title="Team B Score" placeholder="Score for <?php echo $_SESSION['teamBScore']; ?>" required autofocus><br>
				<h5 class="form-signin-heading">Innings</h5>
				<input type="number" min="9" class="form-control" name="innings" id="innings" title="innings" placeholder="Total Innings" required autofocus><br>
				<?php
				if (isset($sucMSG)) {
					
					?>
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-submit-editscore">Submit</button><br><br>
					<?php
					}
				?>
				<button class="btn btn-lg btn-danger btn-block" type="button" onclick="window.location.href = 'admin.php' "; name="btn-cancel">Cancel</button>
			</div>
          </form>
    
        </div>
	</div>
</div>
</HTML>
