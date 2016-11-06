<?php

/**
 * Class Theme for Javelinee CMS theme.
 * 
 * @version: 1.0 / 14 Feb 2015
 * @author: M ABD AZIZ ALFIAN <aalfiann@gmail.com>
 * @copyright 2014 Javelinee
 * @license: Creative Common License
 * 
 */

	class theme {
		
		protected $urls;
		
		// Classify function -> to register class on theme 
		public static function classify(){
			global $root,$site;
			include_once $root.'theme/'.$site['theme'].'/class/class.portfolio.php'; // Class Portfolio Theme
			include_once $root.'theme/'.$site['theme'].'/class/class.contact.php'; // Class Contact
			include_once $root.'theme/'.$site['theme'].'/class/class.java.php'; // Class Java
			include_once $root.'theme/'.$site['theme'].'/class/class.custom.php'; // Class Custom
			//include_once $root.'theme/'.$site['theme'].'/class/class.captcha.php'; 
		}

		// Configure function -> to read custom config theme
		public static function configure(){
			global $root,$site,$configtheme,$otheme;
			$configtheme = $root.'theme/'.$site['theme'].'/option/config.php'; // Configuration Theme
			if (file_exists($configtheme)) {include $configtheme;}
		}

		// Url function -> build url path theme automatically
		public static function url($javtheme){
			global $host,$site,$otheme,$root;
			echo $host.'theme/'.$site['theme'].'/'.$javtheme;
		}

		// Urls function -> build url path theme automatically inside variable
		public static function urls($urlstheme){
			global $host,$site,$root,$otheme;
			$urls = $host.'theme/'.$site['theme'].'/'.$urlstheme;
			return $urls;
		}
	}