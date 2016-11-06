<?php

	$ServerDatabase = "localhost"; // Your url domain or server database. Example: http://javelinee.com or localhost
	$NameDatabase = "javelinee"; // Your Database Name.
	$UserDatabase = "root"; // Your Database User.
	$PasswordDatabase = "root"; // Your Password database.
	
		mysql_connect($ServerDatabase, $UserDatabase, $PasswordDatabase);
		mysql_select_db($NameDatabase);

		if (mysql_error()) {
			include 'set.lang.php';
			header("Location: ".$host."acp/404.php");
			exit;
		}
?>