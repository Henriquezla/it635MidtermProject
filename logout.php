<?php
	session_start();	
	unset($_SESSION['user']);
	unset($_SESSION["state"]);
	unset($_SESSION['admin_rights']);
	unset($_SESSION['f_name']);
	unset($_SESSION['l_name']);
	session_unset();
	session_destroy();
	header("Location: index.php");
	exit;

?>