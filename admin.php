<?php 
	include("functions.php");
	session_start();
	gatekeeper('Admin');
	ini_set("display_errors", true);
?>

<!DOCTYPE html>
<HTML>
<HEAD>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</HEAD>

<div class="container">
	<div class="row">
    	<div class="container" id="formContainer">

          <form class="form-signin" id="userchoice" role="form" method="post" action="" autocomplete="off">
		  <div style="margin:auto;width: 50%;padding: 40px;">
            <h3 class="form-signin-heading">Pick your choice</h3><br>
            <a href="#" id="flipToRecover" class="flipLink">
            </a>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-addrmv-teams">Add/Remove Teams</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-addrmv-players">Add/Remove Players</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-add-match">Add Match to Schedule</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-update-score">Update Match Score</button>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-view-roster">View Team Roster</button><br>
			<button class="btn btn-lg btn-danger btn-block" type="submit" name="btn-logout">Sign Out</button>
			</div>
          </form>
		  
        </div> <!-- /container -->
	</div>
</div>
</HTML>