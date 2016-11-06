<?php
$string = '<?php
			/* SEO Static Configuration */
				
			/* Basic SEO */
				$sseo[\'front_meta_title\'] = "'.$_POST['front_meta_title'].'";
				$sseo[\'front_meta_keywords\'] = "'.$_POST['front_meta_keywords'].'";			
				$sseo[\'front_meta_description\'] = "'.$_POST['front_meta_description'].'";

				$sseo[\'hashtag_meta_title\'] = "'.$_POST['hashtag_meta_title'].'";
				$sseo[\'hashtag_meta_keywords\'] = "'.$_POST['hashtag_meta_keywords'].'";			
				$sseo[\'hashtag_meta_description\'] = "'.$_POST['hashtag_meta_description'].'";

				$sseo[\'post_meta_title\'] = "'.$_POST['post_meta_title'].'";
				$sseo[\'post_meta_keywords\'] = "'.$_POST['post_meta_keywords'].'";			
				$sseo[\'post_meta_description\'] = "'.$_POST['post_meta_description'].'";

				$sseo[\'forum_meta_title\'] = "'.$_POST['forum_meta_title'].'";
				$sseo[\'forum_meta_keywords\'] = "'.$_POST['forum_meta_keywords'].'";			
				$sseo[\'forum_meta_description\'] = "'.$_POST['forum_meta_description'].'";

				$sseo[\'category_meta_title\'] = "'.$_POST['category_meta_title'].'";
				$sseo[\'category_meta_keywords\'] = "'.$_POST['category_meta_keywords'].'";			
				$sseo[\'category_meta_description\'] = "'.$_POST['category_meta_description'].'";

				$sseo[\'search_meta_title\'] = "'.$_POST['search_meta_title'].'";
				$sseo[\'search_meta_keywords\'] = "'.$_POST['search_meta_keywords'].'";			
				$sseo[\'search_meta_description\'] = "'.$_POST['search_meta_description'].'";
				
			/* End SEO Static Configuration */
			';
		
		$fp = fopen("../config.s.seo.php", "w");
		fwrite($fp,$string.$stringcolor.$stringtheme);
		fclose($fp);
		header('Location: ../seo.php');
 ?>