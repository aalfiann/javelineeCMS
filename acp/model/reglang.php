<?php
function OnTheme($namefoldertheme,$themelangfile){
	global $root,$lang,$host,$site;
	$themelang = $root.'/theme/'.$namefoldertheme.'/option/'.$themelangfile;
		if (file_exists($themelang)) {include $themelang;}
}

function OnApps($namefolderapps,$appslangfile){
	global $root,$lang,$host,$site;
	$appslang = $root.'/acp/apps/'.$namefolderapps.'/'.$appslangfile;
		if (file_exists($appslang)) {include $appslang;}
}
?>