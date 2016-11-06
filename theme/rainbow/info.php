<?php
// Variable path theme
$theme = 'theme/rainbow/'; // At the end, always put with slash
$loadmore=6; //Default number loading portfolio
$author_theme = 'M ABD AZIZ ALFIAN';
$url_author_theme = 'http://javelinee.com';
$component_theme = 'Bootstrap 3.2.0, Font Awesome 4.1.0';
$name_theme = 'Rainbow';
$version_theme = '1.2';
$description_theme = 'Rainbow is multi style css theme for Javelinee which is created using Twitter Bootstrap & Font awesome. Rainbow theme already have 16 styles. You can configure the style theme without touching the css and your layout design.';

	// Configure class theme
	require 'class/class.theme.php';
	theme::classify();
	theme::configure();
?>