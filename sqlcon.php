
<?php
	include("account.php");

	$dbh = mysqli_connect($hostname, $username, $password, $project);
	if (!$dbh) {
		echo "Error: Unable to connect to MySQL." . "<br>";
		echo "Debugging error: " . mysqli_connect_errno() . "<br>";
		echo "Debugging error: " . mysqli_connect_error() . "<br>";
		exit;
	} else {
		echo "Connection was successful." . "<br>";
	}
	$dataSet = "";
	$userQuery = "SELECT * FROM players;";
	$result = $dbh->query($userQuery);
	
	while($row = $result->fetch_array()){
		$rows[] = $row;
	}
	
	foreach($rows as $row){
		echo $row['id'] . "<br>";
	}
?>