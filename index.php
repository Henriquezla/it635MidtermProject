<?php
	session_start();
	require_once 'sqlcon.php';
	ini_set("display_errors", true);
	/* if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	} */
	$error = false;
	if( isset($_POST['btn-signin']) ) {
		
		// sanitizing input
		$email = htmlspecialchars(strip_tags(trim($_POST['email'])));
		$pass = htmlspecialchars(strip_tags(trim($_POST['pass'])));
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
			echo $emailError;
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
			echo $emailError;
		}
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
			echo $passError;
		}
		
		if (!$error) {
			echo "no error <br>";
			$username = hash('sha256',$email);
			//$password = crypt($pass,$salt);
			$query = "SELECT * FROM users WHERE email_hash='".$username."'";
			$result = $dbh->query($query);
			$row = array();
			if($result){
				$row = $result->fetch_array(MYSQLI_ASSOC);
				/* echo crypt($pass,$row['pw_hash']).PHP_EOL;
				echo $row['pw_hash'].PHP_EOL; */
				if(crypt($pass,$row['pw_hash'])==$row['pw_hash']){
					$_SESSION['user'] = $username;
					header("Location: home.php");
					
				}else{
					echo "Username or Password not found.";
					
				}
				
			}else{
				echo "Username or Password not found.";
			}
			/* if( $count == 1 && $eqPwHash == 1 ) {
				if(strcmp("Y",$pwResFlag) == 0){
					$_SESSION['user'] = $sqlEmail;
					error_log("[{$date}] [{$file}] [{$level}] User {$sqlEmail} signed in.  Password change is required.".PHP_EOL, 3, $LOGFILE);
					header("Location: changepwd.php");
				}
				else{
					$_SESSION['user'] = $sqlEmail;
					error_log("[{$date}] [{$file}] [{$level}] User {$sqlEmail} successfully signed in.".PHP_EOL, 3, $LOGFILE);
					header("Location: home.php");
				}
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
				error_log("[{$date}] [{$file}] [Warning] User from IP {$_SERVER['REMOTE_ADDR']} tried to sign in with incorrect credentials".PHP_EOL, 3, $LOGFILE);
				
			} */
				
		}
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

<div class="container">
	<div class="row">
    	<div class="container" id="formContainer">

          <form class="form-signin" id="login" role="form" method="post" action="" autocomplete="off">
            <h3 class="form-signin-heading">Please sign in</h3><br>
            <a href="#" id="flipToRecover" class="flipLink">
              <div id="triangle-topright"></div>
            </a>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required autofocus><br>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-signin">Sign in</button>
          </form>
    
        </div> <!-- /container -->
	</div>
</div>
</HTML>
