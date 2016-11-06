<?php
include 'config.seo.php';
	if ($seo['type_url'] == "clean") echo GetSitemapClean();
		else echo GetSitemap(); ?>        