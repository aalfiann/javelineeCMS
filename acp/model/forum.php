<?php
// Call layout theme
function forum() {
	global $content_old,$layout,$site,$root,$user,$userava,$viewforum;
	include $root.'/acp/model/set.lang.php';
	include 'check.php';
   $filename = $layout;
	$handle = fopen($filename, "rb");
	if (filesize($filename) > 0){$content_old = fread($handle, filesize($filename));
			$viewforum = "<a href=\"".$host."/?p=forum\" target=\"_blank\" class=\"btn btn-info\">View Forum</a>";}
		else {$content_old = $lang['paste_embed'];}
	fclose($handle);
}
	