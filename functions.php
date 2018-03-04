<?php	
	
	function gatekeeper($type){
		if ($_SESSION['user']==""){
			echo '<h3 class="form-signin-heading">You must login to access this page.<br> Redirecting to Login page...</h3><br>';
			echo '<img src="403.jpg" alt="Cant touch this" style="width:132px;height:80px;border:12;">';
			header("refresh:3; url=index.php");
			exit();
			
		}
		
		if ($_SESSION["state"] != $type) {
			echo "<h3 class='form-signin-heading'>Login as '$type'.<br> Redirecting to Homepage...</h3><br>";
			echo '<img src="403.jpg" alt="Cant touch this" style="width:132px;height:80px;border:12;">';
			header("refresh:3; url=index.php");
			exit();
			
		}
		
	}
	
	
	function sanitizeData($userInput){
		include("sqlcon.php");
		$sanitizedData = mysqli_real_escape_string($dbh, htmlspecialchars(strip_tags(trim($userInput))));
		return $sanitizedData;
		
	}
	
?>