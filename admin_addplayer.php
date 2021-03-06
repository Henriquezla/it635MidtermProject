<?php 
	include("functions.php");
	session_start();
	gatekeeper('Admin');
	require_once 'sqlcon.php';
	
	if(isset($_POST['btn-cancel']) ) {
		header('index.php');
		exit;
	}
	
	if(isset($_POST['btn-submit-addplayer']) ) {
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
		
		if(!$error && $_SESSION["state"] === 'Admin') {
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
				<h3 class="form-signin-heading">Enter Player Information</h3><br>
				<a href="#" id="flipToRecover" class="flipLink">
				</a>
				<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required autofocus><br>
				<input type="text" class="form-control" name="minitial" pattern=".{1}" title="Enter a single letter" id="minitial" placeholder="Middle Initial"><br>
				<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required autofocus><br>
				<input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" required autofocus><br>
				<input type="text" class="form-control" name="country" id="country" pattern="[A-Za-z]{2}" title="Enter a two letter country code" placeholder="Country of Birth" required autofocus><br>
				<input type="text" class="form-control" name="throwsbats" id="throwsbats" pattern="[RLArla]{1}" title="Enter R, L or A" placeholder="Throws/Bats (R,L,A)" required autofocus><br>
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-submit-addplayer">Submit</button><br><br>
				<button class="btn btn-lg btn-danger btn-block" type="button" onclick="window.location.href = 'admin.php' "; name="btn-cancel">Cancel</button>
			</div>
          </form>
    
        </div>
	</div>
</div>
</HTML>
