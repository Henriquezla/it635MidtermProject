<?php
	include("sqlcon.php");
	ob_start();
	session_start();
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}
	
	if( isset($_POST['btn-signin']) ) {
		// sanitizing input
		$email = htmlspecialchars(strip_tags(trim($_POST['email'])));
		$pass = htmlspecialchars(strip_tags(trim($_POST['pass'])));
		/* $dataSet = "";
		$userQuery = "SELECT * FROM players LIMIT 5;";
		$result = $dbh->query($userQuery);

		while($row = $result->fetch_array()){
			$rows[] = $row;
		}

		foreach($rows as $row){
			echo $row['f_name'] . "<br>";
		} */
	
	}
	
	
?>


<!DOCTYPE html>
<HTML>
<HEAD>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</HEAD>
<!--Inspired by http://tutorialzine.com/2012/02/apple-like-login-form/ - Apple-like Login Form with CSS 3D Transforms -->

<div class="container">
	<div class="row">
    	<div class="container" id="formContainer">

          <form class="form-signin" id="login" role="form">
            <h3 class="form-signin-heading">Please sign in</h3>
            <a href="#" id="flipToRecover" class="flipLink">
              <div id="triangle-topright"></div>
            </a>
            <input type="email" class="form-control" name="email" id="email" size="40" placeholder="Email address" required autofocus>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-signin">Sign in</button>
          </form>
    
        </div> <!-- /container -->
	</div>
</div>
</HTML>
