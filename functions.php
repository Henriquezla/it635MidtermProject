<?php	
	require_once 'sqlcon.php';
	function gatekeeper($type){
		if ($_SESSION['user']==""){
			echo "Login first. Redirecting to Login page...<br>";
			header("refresh:3; url=index.php");
			exit();
			
		}
		
		if ($_SESSION["state"] != $type) {
			echo "Login as '$type'. Redirecting to Login page...<br>";
			header("refresh:3; url=index.php");
			exit();
			
		}
		
	}
	
	
	function sanitizeData($userInput){
		$sanitizedData = (mysqli_real_escape_string($dbh,htmlspecialchars(strip_tags(trim($userInput)))));
		return $sanitizedData;
		
	}
	
?>