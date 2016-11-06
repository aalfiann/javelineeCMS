<?php
include '../config.php';

if ($_POST['color'] == "Choose Color") {			
				$stringcolor = '	$site[\'color\'] = "'.$_POST['oldcolor'].'";
				';				
				} else {
				$stringcolor = '	$site[\'color\'] = "'.$_POST['color'].'";
				';	}
if ($_POST['theme'] == "Choose Theme") {			
				$stringtheme = '$site[\'theme\'] = "'.$_POST['oldtheme'].'";
				
			/* Server Host */
			   $host = \'http://\'.$_SERVER[\'HTTP_HOST\'].\'/\'.$site[\'dir\'];
			   $root = $_SERVER[\'DOCUMENT_ROOT\'].\'/\'.$site[\'dir\'];			
				';				
				} else {
				$stringtheme = '$site[\'theme\'] = "'.$_POST['theme'].'";
				
			/* Server Host */
			   $host = \'http://\'.$_SERVER[\'HTTP_HOST\'].\'/\'.$site[\'dir\'];
			   $root = $_SERVER[\'DOCUMENT_ROOT\'].\'/\'.$site[\'dir\'];			
				';	}

if (fopen("http://".$_SERVER['HTTP_HOST']."/".$site['dir']."/theme/".$site['theme']."/".$_POST['page'], "r")) {				
			
$stringpage = '
			/* Default Route */
				$url[\'page\'] = "'.$_POST['page'].'";
 
			/* End Configuration */	
';
} else {$stringpage = '
			/* Default Route */
				$url[\'page\'] = null; 
			
			/* End Configuration */	
			';}
						
			$string = '<?php
			/* Website Configuration */
			
			/* About Website */
				$site[\'url_site\'] = "'.$_POST['url_site'].'";	// Your url domain, Example http://javelinee.com
				$site[\'title\'] = "'.$_POST['title'].'";
				$site[\'version\'] = "2.4";
				$site[\'author\'] = "'.$_POST['author'].'";
				$site[\'url_author\'] = "'.$_POST['url_author'].'";
				$site[\'email\'] = "'.$_POST['email'].'";
				$site[\'copyright\'] = "'.$_POST['copyright'].'";
				$site[\'dir\'] = "'.$_POST['dir'].'"; // Leave blank if you doesn\'t put the script in any folder root
				
				
			/* User Info Sessions */
				if (isset($_SESSION[\'username\'])){
					$user = $_SESSION[\'username\'];
				}
				
				if (isset($_SESSION[\'avatar\'])){
					$userava = $_SESSION[\'avatar\'];
				}
				
			/* Other Plugin */
				$comment[\'disqus\'] = "'.$_POST['comment'].'";			
			
			/* Theme Website */ 
			';
		
		$fp = fopen("../config.php", "w");
		fwrite($fp,$string.$stringcolor.$stringtheme.$stringpage);
		fclose($fp);
		header('Location: ../setting.php');
 ?>