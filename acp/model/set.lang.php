<?php 
// session_start send by page
// if(!isset($_SESSION)) { header('Cache-control: private');}
// IE 6 FIX
if (isSet($_GET['lang'])) {
	$lang = $_GET['lang'];

	// register the session and set the cookie
	$_SESSION['lang'] = $lang;

	if(!isset($_SESSION)) { header('Cache-control: private'); setcookie("lang", $lang, time() + (3600 * 24 * 30));}
} else if (isSet($_SESSION['lang'])) {
	$lang = $_SESSION['lang'];
} else if (isSet($_COOKIE['lang'])) {
	$lang = $_COOKIE['lang'];
} else {
	$lang = 'id';
}

switch ($lang) {
	case 'en' :
		$lang_file = 'lang.en.php';
		break;
	case 'id' :
		$lang_file = 'lang.id.php';
		break;
		
	default :
		$lang_file = 'lang.id.php';
}

include $root.'/acp/language/' . $lang_file;
?>