<?php 
	include("functions.php");
	session_start();
	gatekeeper('Admin');
	ini_set("display_errors", true);
	echo "You're an admin.";
?>