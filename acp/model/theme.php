<?php
/* This is default function logic for all default theme page Javelinee.
This function logic maybe won't work on your custom theme.
*/

// Call layout theme
function edit() {
	global $userava,$user,$root,$site,$layout,$content_old;
	include 'check.php';
	include 'admin.only.php';
   $filename = '../'.$layout.'';
	$handle = fopen($filename, "rb");
	$content_old = fread($handle, filesize($filename));
	fclose($handle);
	}	

// Call editor theme	
function EditArea() {
	global $host;
	echo "<!-- Edit_area -->";
	echo "<script language=\"javascript\" type=\"text/javascript\" src=\"".$host."/acp/js/edit_area/edit_area_full.js\"></script>";
   echo "<script language=\"javascript\" type=\"text/javascript\">";
   echo "editAreaLoader.init({";
	echo "id : \"textarea_1\"";
	echo ",start_highlight: false";	
	echo ",allow_resize: \"both\"";
	echo ",allow_toggle: true";
	echo ",word_wrap: false";
	echo ",language: \"en\"";
	echo ",syntax: \"html\"";	
   echo "});";
 	echo "</script>";
 }
 
