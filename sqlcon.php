
<?php
	include("account.php");

	$dbh = mysqli_connect($hostname, $username, $password, $project);
	if (!$dbh) {
		echo "Error: Unable to connect to MySQL." . "<br>";
		echo "Debugging error: " . mysqli_connect_errno() . "<br>";
		echo "Debugging error: " . mysqli_connect_error() . "<br>";
		exit;
	}
	
?>