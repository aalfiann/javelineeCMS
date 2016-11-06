<?php
session_start();
include '../../config.php';
include_once $root.'/acp/model/set.lang.php';
if (isset($_POST['save_zopim'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("embed.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_save_embed']."\");";
			echo "window.location.href = \"index.php\";";			
			echo "</script>";
			echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=index.php\"></noscript></head><body><noscript>".$lang['success_save_embed']."</noscript></body></html>";
}
?>