<?php
	session_start();
	if (isset($_GET['logout'])) {
		unset($_SESSION['user']);
		unset($_SESSION["state"]);
		unset($_SESSION['admin_rights']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;
	}


?>