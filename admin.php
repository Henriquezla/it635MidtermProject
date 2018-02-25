<?php 
	session_start();
	gatekeeper('Admin');
	echo "You're an admin.";
?>