<?php

// Variable path theme
	$theme = 'theme/simpletrip/'; // At the end, always put with slash
	$loadmore=3; //Default number loading portfolio
	$author_theme = 'M ABD AZIZ ALFIAN';
	$url_author_theme = 'http://javelinee.com';
	$component_theme = 'HTML5, jQuery 1.11.1, Bootstrap 3.2.0, Font Awesome 4.2.0';
	$name_theme = 'Simple Trip';
	$version_theme = '1.1.0';
	$description_theme = 'Simple Trip is multi style css theme for Javelinee CMS which is created using Twitter Bootstrap & Font awesome. Simple Trip is based on Rainbow theme which is already have 16 styles css. You can configure the style theme without touching the css and your layout design.';

	// Configure class theme
	require 'class/class.theme.php';
	theme::classify();
	theme::configure();

?>