
<?php
	include("account.php");

	$dbh = mysqli_connect($hostname, $username, $password, $project);
	if (!$dbh) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	} else {
		echo "Connection was successful." . PHP_EOL;
	}
	$dataSet = "";
	$userQuery = "SELECT * FROM players;";
	$result = $dbh->query($userQuery);
	
	while($row = $result->fetch_array()){
		$rows[] = $row;
	}
	
	foreach($rows as $row){
		echo[$row];
	}
?>