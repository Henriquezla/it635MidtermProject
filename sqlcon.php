#!/usr/bin/php

<?php
echo $argv[0]." begin".PHP_EOL;
$mysql = new mysqli("localhost","root","ImdbGr0up!","Students");
if ($mysql->errno != 0) {
	echo "error connecting to database: " . $mysql->error.PHP_EOL;
	exit(0);
}
$sql = "select * from students;";
$response = $mysql->query($sql);
if ($response->errno != 0) {
        echo "error executing sql: " . $mysql->error.PHP_EOL;
        echo $sql.PHP_EOL;
	exit(0);
}
while($result = $response->fetch_assoc()){
	print_r($result);
	echo PHP_EOL;
}
echo $argv[0]." end".PHP_EOL;
?>