
<?php
	include("account.php");

	$dbh = mysqli_connect($hostname, $username, $password, $project);
	if (!$dbh) {
		echo "Error: Unable to connect to MySQL." . '\n\r';
		echo "Debugging error: " . mysqli_connect_errno() . '\n\r';
		echo "Debugging error: " . mysqli_connect_error() . '\n\r';
		exit;
	} else {
		echo "Connection was successful." . '\n\r';
	}
	$dataSet = "";
	$userQuery = "SELECT * FROM players;";
	$result = $dbh->query($userQuery);
	
	while($row = $result->fetch_array()){
		$rows[] = $row;
	}
	
	foreach($rows as $row){
		echo $row['id'] . '\n\r';
	}
?>