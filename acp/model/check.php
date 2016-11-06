<?php 
include 'dev.mode.php';

	if(!isset($_SESSION)) { session_start(); }
		include $root.'/acp/config.php';
		
			if (!isset($_SESSION['username'])){
				header("Location: ".$host."/?p=login");
				exit;}
				elseif (!isset($_SESSION['pass'])){
					header("Location: ".$host."/?p=login");
					exit;}

			else {include_once 'database.php';
				$query = "SELECT * FROM user WHERE username = '$user'";
				$hasil = mysql_query($query);
				$cekdata  = mysql_fetch_array($hasil);

				if ($cekdata == 0) {
					unset($_SESSION['username']);
					unset($_SESSION['pass']);
					header("Location: ".$host."/?p=login");}
					else {if ($_SESSION['pass'] != $cekdata['password']) {
						unset($_SESSION['username']);
						unset($_SESSION['pass']);
						header("Location: ".$host."/?p=login");}
					}
			}
?>