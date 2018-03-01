<?php 
	include("functions.php");
	session_start();
	gatekeeper('Admin');
	require_once 'sqlcon.php';
	ini_set("display_errors", true);
	if(isset($_POST['btn-submit-addplayer']) ) {
		echo $_POST['fname'].'<br>';
		echo $_POST['minitial'].'<br>';
		echo $_POST['lname'].'<br>';
		echo $_POST['dob'].'<br>';
		echo $_POST['country'].'<br>';
		echo $_POST['throwsbats'].'<br>';
	}
	if(isset($_POST['btn-submit-addplayer']) ) {
		header('index.php');
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
				<button class="btn btn-lg btn-danger btn-block" type="submit" name="btn-cancel">Cancel</button>
			</div>
          </form>
    
        </div> <!-- /container -->
	</div>
</div>
</HTML>
