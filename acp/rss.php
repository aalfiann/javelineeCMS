<?php
include 'config.seo.php';
	if ($seo['type_url'] == "clean") echo GetRSSClean();
		else echo GetRSS(); ?>  