<?php
include $root.'acp/apps/supercache/setting.php';
if ($supercache['use'] == "enable"){
	//global $_GET;
	if (empty($_GET['p'])) {$namecache = "index";} 
	else {$namecache = $_GET['p'].'-'.((empty($_GET['s']))? ((empty($_GET['hash']))? '' : $_GET['hash']) : $_GET['s']).'-'.((empty($_GET['page']))? '' : $_GET['page']);}
		$cachefile = 'cache/cached-'.$namecache.'.html';
		$cachetime = $supercache['max_time'];
		//$cachegen = date("H:i", filemtime($cachefile));

// Serve from the cache if it is younger than $cachetime
	if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    	include($cachefile);
    	exit;
	}


ob_start(); // Start the output buffer
echo "<!-- Cached copy, generated by Super Cache for Javelinee -->"."\n";
}?>