<?php
$string = '<?php
			/* SEO Configuration */
				
			/* Basic SEO */
				$seo[\'type_url\'] = "'.$_POST['url'].'";
				$seo[\'spider\'] = "'.$_POST['spider'].'";
				$seo[\'author\'] = "'.$_POST['author'].'";			
				$seo[\'alexa_webmaster\'] = "'.$_POST['alexa_webmaster'].'";
				$seo[\'google_webmaster\'] = "'.$_POST['google_webmaster'].'";
				$seo[\'bing_webmaster\'] = "'.$_POST['bing_webmaster'].'";
				$seo[\'pinterest_webmaster\'] = "'.$_POST['pinterest_webmaster'].'";
				$seo[\'twitter_webmaster\'] = "'.$_POST['twitter_webmaster'].'";
				$seo[\'yandex_webmaster\'] = "'.$_POST['yandex_webmaster'].'";
				$seo[\'rss_title\'] = "'.$_POST['rss_title'].'";
				$seo[\'rss_descriptions\'] = "'.$_POST['rss_descriptions'].'";
				$seo[\'rss_limit\'] = "'.$_POST['rss_limit'].'";
				$seo[\'sitemap_limit\'] = "'.$_POST['sitemap_limit'].'";
				$seo[\'google_analytics\'] = "'.$_POST['google_analytics'].'";
				$seo[\'share_this\'] = "'.$_POST['share_this'].'";
				
			/* End SEO Configuration */
			';
		
		$fp = fopen("../config.seo.php", "w");
		fwrite($fp,$string.$stringcolor.$stringtheme);
		fclose($fp);
		header('Location: ../seo.php');
 ?>