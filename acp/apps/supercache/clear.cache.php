<?php
include '../../config.php';
if (base64_encode(date('dmY')) == $_GET['gen']) {
	$files = glob($root.'cache/*'); // get all file names
		foreach($files as $file){ // literate files
  			if(is_file($file)) unlink($file); // delete file
		}
	header('Location: index.php');
	}