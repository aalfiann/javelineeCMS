<?php

include 'secret.php';

function Login() {
	global $root,$secret_key,$secret_token;
	include 'database.php';
	include_once 'safe.php';
	include_once 'config.php';
	include $root.'/acp/model/set.lang.php';
	
		session_start();			
		
		$username = safe($_POST['username']);
		$password = safe($_POST['password']);

		$query = "SELECT * FROM user,user_info WHERE user.username = user_info.username AND user.username = '$username' AND user.status='active'";
		$hasil = mysql_query($query);
			if (!$hasil) IsQueryError();

		$data  = mysql_fetch_array($hasil);
		$kodeunik  = $secret_key;
		$kodeunik2 = $secret_token;

			if (md5($kodeunik.md5($password).$kodeunik) == $data['password'])
				{$_SESSION['username'] = $username;
					$_SESSION['avatar'] = $data['avatar'];
					$_SESSION['pass'] = $data['password'];
					if (base64_decode($data['role']) == $username.$kodeunik2.$data['password']."1")
						{$_SESSION['mode'] = "master";} else {$_SESSION['mode'] = "user";}
					header ("location: ".$host."acp/index.php");}
			else {echo $lang['wrong_login'];}
}

function register() {
	global $root,$secret_key,$secret_token;
	include 'database.php';
	include_once 'safe.php';
   include_once 'config.php';
   include $root.'/acp/model/set.lang.php';

		$username  = safe($_POST['username']);
		$password1 = safe($_POST['password1']);
		$password2 = safe($_POST['password2']);
		$avatar = "/acp/images/a0.png";

			if ($password1 == $password2){	
				$kodeunik  = $secret_key;
				$kodeunik2 = $secret_token;
				$password1 = md5($kodeunik.md5($password1).$kodeunik);

				$cquery = "SELECT * FROM user";
				$chasil = mysql_query($cquery);
				$cuser = mysql_num_rows($chasil);
					if ($cuser > 0) {$koderole = "2";} else {$koderole="1";}
				$hrole = base64_encode($username.$kodeunik2.$password1.$koderole);

				$query = "INSERT INTO user VALUES('$username', '$password1', '$avatar', current_timestamp, '', 'active')";
				$hasil = mysql_query($query);

				$rquery = "INSERT INTO user_info VALUES('$username', '$hrole', '', '', '', '', '', '')";
				$rhasil = mysql_query($rquery);
	
					if ($hasil) {echo $lang['success_register'];}
						else { echo $lang['no_username'];}
				}
			else { echo $lang['no_password'];}
}

if (isset($_POST['unlock'])) {
	global $userava,$user,$root,$secret_key,$secret_token;
	include '../config.php';
	include 'database.php';
	include 'safe.php';
	include $root.'/acp/model/set.lang.php';
	
	$username = $_GET['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM user,user_info WHERE user.username = user_info.username AND user.username = '$username' AND user.status='active'";
	$hasil = mysql_query($query);
		if (!$hasil) IsQueryError();

	$data  = mysql_fetch_array($hasil);
	$kodeunik  = $secret_key;

		if (md5($kodeunik.md5($password).$kodeunik) == $data['password']){
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['pass'] = $data['password'];
			$_SESSION['avatar'] = $data['avatar'];
			if (base64_decode($data['role']) == $username.$kodeunik2.$data['password']."1")
						{$_SESSION['mode'] = "master";} else {$_SESSION['mode'] = "user";}
			header("Location: ".$host."acp/index.php");}
		else {header("Location: ".$host."acp/index.php");}
}
