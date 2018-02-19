<?php
	include("sqlcon.php");
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