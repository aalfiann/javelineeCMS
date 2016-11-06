<?php
$string = '<?php
			/* Open Graph Settings  */
				
				$opengraph[\'tw_card\'] = "'.$_POST['tw_card'].'";
				$opengraph[\'tw_site\'] = "'.$_POST['tw_site'].'";
				$opengraph[\'tw_image\'] = "'.$_POST['tw_image'].'";
				$opengraph[\'tw_url\'] = "'.$_POST['tw_url'].'";
				$opengraph[\'tw_title\'] = "'.$_POST['tw_title'].'";
				$opengraph[\'tw_description\'] = "'.$_POST['tw_description'].'";
				$opengraph[\'tw_content_page\'] = "'.$_POST['tw_content_page'].'";
				
			';
		
		$fp = fopen("og.tw.php", "w");
		fwrite($fp,$string.$stringcolor.$stringtheme);
		fclose($fp);
		header('Location: index.php');

 ?>