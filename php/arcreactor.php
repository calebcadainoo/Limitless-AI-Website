<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	// $_SESSION['logged_in'] = "";
	include_once("connect.php");

?>