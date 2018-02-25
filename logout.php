<?php
	session_start();
	ini_set("display_errors", true);
	//if (isset($_POST['logout'])) {
		unset($_SESSION['user']);
		unset($_SESSION["state"]);
		unset($_SESSION['admin_rights']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;
	//}


?>