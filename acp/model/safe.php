<?php

// How to use:
//-------------------------------------
// contoh memanggil fungsi safe
//$variable = safe($_POST['variable']);
//$variable = safe($_GET['variable']);
//-------------------------------------


	//Function safe for prevent SQL Injection
	function safe($value){
   	return mysql_real_escape_string($value);
		}
	
	//Function safe for Handling Error Query 
	function IsQueryError() {
		global $root,$host;
		include $root.'/acp/config.php';
		return header("Location: $host/?p=error");
		}
