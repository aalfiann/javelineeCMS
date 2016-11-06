<?php
	class route {

		public static function basedefault($page="") {
			global $_SERVER,$_SESSION,$category,$portfolio,$comment,$seo,$url,$data,$host,$root,$site,$otheme;

			// Initializing Class / Function / URL / Variable for Theme
			if ($seo['type_url'] == "clean") include_once $root.'/acp/model/init.php'; else include_once $root.'/acp/model/init.manual.php';

			// Default route 
			if (empty($_GET)) {
				if ($url['page'] == null)	
				{
					if ($page == NULL) {include 'theme/'.$site['theme'].'/index.php'; exit;}
					else {include 'acp/'.$page.'.php'; exit;}
				}
				else { 
				if(!file_exists('theme/'.$site['theme'].'/'.$url['page'])){
   					header("Location: ".$url['page'].""); exit;}
   					else {
						   if ($page == NULL) {include 'theme/'.$site['theme'].'/'.$url['page']; exit;}
						   else {include 'acp/'.$page.'.php'; exit;}
					   }
				}
			}
		}

		public static function theme($namepage){
			global $_SERVER,$_SESSION,$category,$portfolio,$comment,$seo,$url,$data,$host,$root,$site,$otheme;

			// Initializing Class / Function / URL / Variable for Theme
			if ($seo['type_url'] == "clean") include_once $root.'/acp/model/init.php'; else include_once $root.'/acp/model/init.manual.php';
			
			include 'theme/'.$site['theme'].'/'.$namepage.'.php';
		}

		public static function acp($routepage){
			global $_SERVER,$_SESSION,$category,$portfolio,$comment,$seo,$url,$data,$host,$root,$site,$otheme;
			// Initializing Class / Function / URL / Variable for Theme
			if ($seo['type_url'] == "clean") include_once $root.'/acp/model/init.php'; else include_once $root.'/acp/model/init.manual.php';
			include 'acp/'.$routepage.'';
		}
		
}