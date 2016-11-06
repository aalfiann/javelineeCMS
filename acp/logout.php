<?php
	session_start();
	include 'config.php';
	unset($_SESSION['username']);
	unset($_SESSION['mode']);
	header("Location: ".$host."?p=login"); ?>