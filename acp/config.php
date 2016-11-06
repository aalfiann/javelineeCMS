<?php
			/* Website Configuration */
			
			/* About Website */
				$site['url_site'] = "localhost";	// Your url domain, Example http://javelinee.com
				$site['title'] = "Javelinee";
				$site['version'] = "2.4";
				$site['author'] = "M ABD AZIZ ALFIAN";
				$site['url_author'] = "http://about.me/azizalfian";
				$site['email'] = "";
				$site['copyright'] = "Javelinee.com © 2016";
				$site['dir'] = "javelinee/"; // Leave blank if you doesn't put the script in any folder root
				
				
			/* User Info Sessions */
				if (isset($_SESSION['username'])){
					$user = $_SESSION['username'];
				}
				
				if (isset($_SESSION['avatar'])){
					$userava = $_SESSION['avatar'];
				}
				
			/* Other Plugin */
				$comment['disqus'] = "";			
			
			/* Theme Website */ 
				$site['color'] = "primary";
				$site['theme'] = "rainbow";
				
			/* Server Host */
			   $host = 'http://'.$_SERVER['HTTP_HOST'].'/'.$site['dir'];
			   $root = $_SERVER['DOCUMENT_ROOT'].'/'.$site['dir'];			
				
			/* Default Route */
				$url['page'] = "";
 
			/* End Configuration */	
