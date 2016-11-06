<?php
$string = '<?php
			/* Open Graph Settings  */
				
				$opengraph[\'content_page\'] = "'.$_POST['content_page'].'";
				$opengraph[\'og_title\'] = "'.$_POST['og_title'].'";
				$opengraph[\'og_site\'] = "'.$_POST['og_site'].'";
				$opengraph[\'og_type\'] = "'.$_POST['og_type'].'";
				$opengraph[\'og_image\'] = "'.$_POST['og_image'].'";
				$opengraph[\'og_url\'] = "'.$_POST['og_url'].'";
				$opengraph[\'og_description\'] = "'.$_POST['og_description'].'";
				
			';
		
		$fp = fopen("og.fb.php", "w");
		fwrite($fp,$string.$stringcolor.$stringtheme);
		fclose($fp);
		header('Location: index.php');

 ?>