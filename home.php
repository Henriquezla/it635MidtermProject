<?php 
	session_start();
	gatekeeper('User');
	echo "You're a regular user.";
?>