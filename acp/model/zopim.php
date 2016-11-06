<?php
function LiveChat() {
	global $userava,$lang,$user,$root,$site,$layout,$content_old;
	include $root.'/acp/model/set.lang.php';
	include 'check.php';
   $filename = $layout;
	$handle = fopen($filename, "rb");
	if (filesize($filename) > 0){$content_old = fread($handle, filesize($filename));}
		else {$content_old = $lang['paste_embed_zopim'];}
	fclose($handle);
}