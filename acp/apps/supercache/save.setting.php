<?php
$string = '<?php
			/* Super Cache Setting */
				
				$supercache[\'max_time\'] = "'.$_POST['cache_time'].'";
				$supercache[\'use\'] = "'.$_POST['use'].'";
			';
		
		$fp = fopen("setting.php", "w");
		fwrite($fp,$string.$stringcolor.$stringtheme);
		fclose($fp);
		header('Location: index.php');

 ?>