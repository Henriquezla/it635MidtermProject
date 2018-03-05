<?php 
	include("functions.php");
	session_start();
	gatekeeper('Admin');
	
	if(isset($_POST['btn-logout']) ) {
		header("Location: logout.php");
	}
	if(isset($_POST['btn-add-players']) ) {
		header("Location: admin_addplayer.php");
	}
	if(isset($_POST['btn-add-teams']) ) {
		header("Location: admin_addteam.php");
	}
	if(isset($_POST['btn-rmv-teams']) ) {
		header("Location: admin_rmvteam.php");
	}
	if(isset($_POST['btn-rmv-players']) ) {
		header("Location: admin_rmvplayer.php");
	}
	if(isset($_POST['btn-add-players-team']) ) {
		header("Location: admin_addplayerteam.php");
	}
	if(isset($_POST['btn-view-roster']) ) {
		header("Location: admin_viewroster.php");
	}
	if(isset($_POST['btn-add-match']) ) {
		header("Location: admin_addmatch.php");
	}
	if(isset($_POST['btn-update-score']) ) {
		header("Location: admin_updatescore.php");
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

          <form class="form-signin" id="userchoice" role="form" method="post" action="" autocomplete="off">
		  <div style="margin:auto;width: 50%;padding: 40px;">
            <h3 class="form-signin-heading">Welcome Back, <?php echo $_SESSION['f_name']; ?></h3>
            <h4 class="form-signin-heading">Choose an Option</h4><br>
            <a href="#" id="flipToRecover" class="flipLink">
            </a>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-add-teams">Add Teams</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-rmv-teams">Remove Teams</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-add-players">Add Players</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-rmv-players">Remove Players</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-add-players-team">Add Players to Team</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-add-match">Add Match to Schedule</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-update-score">Update Match Score</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-view-roster">View Team Roster</button><br>
			<button class="btn btn-lg btn-danger btn-block" type="submit" name="btn-logout">Sign Out</button>
			</div>
          </form>
		  
        </div>
	</div>
</div>
</HTML>