<?php 

	$checkbase = basename($_SERVER['SCRIPT_FILENAME']);
	
	function EjectUser() {
		global $host;
		header("Location: ".$host."?p=error");
		exit; 
	}

	//=====================================
	//Special rule admin only for some page
	if ($checkbase == "edit.user.php") { 
		if ($_SESSION['mode'] == "user"){
			if ($_GET['username'] != $_SESSION['username']) {
				EjectUser();
			}
		}
	}
	elseif ($checkbase == "edit.post.php") { 
		if ($_SESSION['mode'] == "user"){
			$id_post = mysql_real_escape_string($_GET['id']);
			$cbquery = "SELECT * FROM post, cat_post WHERE post.cat_post = cat_post.id_cat_post AND id_post='$id_post'";
			$cbhasil = mysql_query($cbquery);
			$nocbhasil = mysql_num_rows($cbhasil); 
			$cbdata  = mysql_fetch_array($cbhasil);
				
				if ($nocbhasil > 0) {
					if ($cbdata['username'] != $_SESSION['username']) {
						EjectUser();
					}
				} else {EjectUser();}
		}
	}

	//===========================
	//Default rule admin only
	else { 
		if ($_SESSION['mode'] != "master"){
			EjectUser();
		}
	}
?>