<?php

include 'secret.php';

function ChangePass() {
 
	global $data,$secret_key;
	$username = safe($_POST['username']);
	$password = safe($_POST['password1']);
	$newpassword = safe($_POST['password2']);

	$query = "SELECT * FROM user WHERE username='$username'";
	$hasil = mysql_query($query);
		if (!$hasil) echo IsQueryError();
	$data  = mysql_fetch_array($hasil);

	$kodeunik  = $secret_key;

		if (md5($kodeunik.md5($password).$kodeunik) == $data['password']){
			$kodeunik  = $secret_key;
			$setpassword = md5($kodeunik.md5($newpassword).$kodeunik);
	
         $update = "UPDATE user SET password='$setpassword' WHERE username='$username'";
			$edit = mysql_query($update); 
				if ($edit) echo "<strong> Change password successful!</strong>";}
		else {echo "Change password failed!";}
}

function ChangeAva(){
	global $data;
	$username = safe($_GET['username']);
	if ($_POST['avatar'] == null) {$newavatar="/acp/images/a0.png";} else {$newavatar = filter_var($_POST['avatar'], FILTER_SANITIZE_URL);}
	$updateava = "UPDATE user SET avatar='$newavatar' WHERE username='$username'";
	$editava = mysql_query($updateava);
		if ($editava) echo "<strong> Change avatar successful! You have to relogin!</strong>";
		else {echo "Change avatar failed!";}
}

function ChangeStatus(){
	global $data;
	$username = safe($_GET['username']);
	$newstatus = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
	$updatestatus = "UPDATE user SET status='$newstatus' WHERE username='$username'";
	$editstatus = mysql_query($updatestatus);
		if ($editstatus) echo "<strong> Change status successful!</strong>";
		else {echo "Change status failed!";}
}

function ChangeAnotherInfo(){
	global $data;
	$username = safe($_GET['username']);
		if ($_POST['aboutme'] != null) {$newaboutme = filter_var($_POST['aboutme'], FILTER_SANITIZE_URL);} else {$newaboutme = "";}
		if ($_POST['email'] != null) {$newemail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);} else {$newemail = "";}
		if ($_POST['facebook'] != null) {$newfacebook = filter_var($_POST['facebook'], FILTER_SANITIZE_URL);} else {$newfacebook = "";}
		if ($_POST['google'] != null) {$newgoogle = filter_var($_POST['google'], FILTER_SANITIZE_URL);} else {$newgoogle = "";}
		if ($_POST['twitter'] != null) {$newtwitter = filter_var($_POST['twitter'], FILTER_SANITIZE_URL);} else {$newtwitter = "";}
		if ($_POST['showme'] != null) {$newshowme = filter_var($_POST['showme'], FILTER_SANITIZE_NUMBER_INT);} else {$newshowme = "";}
		
		$updateinfo = "UPDATE user_info SET aboutme='$newaboutme', email='$newemail', facebook='$newfacebook', google='$newgoogle', twitter='$newtwitter', showme='$newshowme' WHERE username='$username'";
		$editinfo = mysql_query($updateinfo);

			if ($editinfo) echo "<strong> Change user info successful!</strong>";
				else {echo "Change user info failed!";}
}

function GetAnotherInfo(){
	global $data,$show,$readinfo,$getinfo;
	$username = safe($_GET['username']);
	$getinfo = "SELECT * FROM user_info WHERE username='$username'";
	$readinfo = mysql_query($getinfo);
	$show  = mysql_fetch_array($readinfo);
}