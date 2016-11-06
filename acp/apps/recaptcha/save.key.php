<?php
$string = '<?php
			/* reCaptcha Key */
				
				$recaptcha[\'public_key\'] = "'.$_POST['public_key'].'";			
				$recaptcha[\'private_key\'] = "'.$_POST['private_key'].'";
				
			';
		
		$fp = fopen("key.php", "w");
		fwrite($fp,$string.$stringcolor.$stringtheme);
		fclose($fp);
		header('Location: index.php');

 ?>