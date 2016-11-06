<?php
if ($_POST['style'] == "Choose Style") {			
				$stringstyle = '	$otheme[\'style\'] = "'.$_POST['oldstyle'].'";
				';				
				} else {
				$stringstyle = '	$otheme[\'style\'] = "'.$_POST['style'].'";
				';	}

if ($_POST['color'] == "Choose Color") {			
				$stringcolor = '$otheme[\'color\'] = "'.$_POST['oldcolor'].'";
				';				
				} else {
				$stringcolor = '$otheme[\'color\'] = "'.$_POST['color'].'";
				';	}

if ($_POST['other'] == "Choose Other Style") {			
				$stringother = '$otheme[\'other\'] = "'.$_POST['oldother'].'";
				';				
				} else {
				$stringother = '$otheme[\'other\'] = "'.$_POST['other'].'";
				';	}

				$string = '<?php
			/* Configuration style theme */

			';

		$fp = fopen("config.php", "w");
		fwrite($fp,$string.$stringstyle.$stringcolor.$stringother);
		fclose($fp);
		header('Location: index.php');