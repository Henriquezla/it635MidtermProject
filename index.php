<?php
	session_start();
	include("functions.php");
	require_once 'sqlcon.php';
	if(isset($_SESSION['user'])!=""){
		if($_SESSION['admin_rights']=='Y'){
			header("Location: admin.php");
		}else{
		header("Location: home.php");
		exit;
		}
	}
	$error = false;
	if( isset($_POST['btn-signin']) ) {
		
		// sanitizing input
		$email = strtolower(htmlspecialchars(strip_tags(trim($_POST['email']))));
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
			$username = hash('sha256',$email);
			$query = "SELECT * FROM users WHERE email_hash='".$username."'";
			$result = $dbh->query($query);
			$row = array();
			if($result){
				$row = $result->fetch_array(MYSQLI_ASSOC);
				if(crypt($pass,$row['pw_hash'])==$row['pw_hash']){
					$_SESSION['user'] = $username;
					$_SESSION['admin_rights'] = $row['admin_rights'];
					$_SESSION['f_name'] = $row['f_name'];
					$_SESSION['l_name'] = $row['l_name'];
					if($_SESSION['admin_rights'] !== 'Y'){
						$_SESSION["state"] = 'User';
						header("Location: home.php");
					}
					if($_SESSION['admin_rights'] == 'Y'){
						$_SESSION["state"] = 'Admin';
						header("Location: admin.php");
					}
					
					
				}else{
					$errMSG = "Incorrect Credentials, Try again...";
					
				}
				
			}else{
				$errMSG = "Incorrect Credentials, Try again...";
				
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
			<div style="margin:auto;width: 50%;padding: 40px;">
				<h3 class="form-signin-heading">Please sign in</h3><br>
				<a href="#" id="flipToRecover" class="flipLink">
				</a>
				<input type="email" class="form-control" name="email" id="email" placeholder="Email address" required autofocus><br>
				<input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required><br>
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-signin">Sign in</button>
			</div>
          </form>
    
        </div>
	</div>
</div>
</HTML>
