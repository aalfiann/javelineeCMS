<?php
 
/**
 * All function inside Java class is only parsing from php to javascript on theme Javelinee CMS.
 * 
 * @version: 1.0
 * @author: M ABD AZIZ ALFIAN <aalfiann@gmail.com>
 * @copyright 2014 Javelinee
 * @license: Creative Common License
 * 
 */

	class java extends theme {

		public static function loadmore(){

			global $host, $site, $total_pages;
		
			echo '<script type="text/javascript">$(document).ready(function() {
				var track_click = 0; 
				var total_pages = '.$total_pages.';
		
				$(\'#results\').load("'.self::urls('portfolio.php').'", {\'page\':track_click}, function() {track_click++;}); 

				$(".load_more").click(function (e) { 
					$(this).hide();
					$(\'.animation_image\').show(); 
						if(track_click <= total_pages){
							$.post("'.self::urls('portfolio.php').'",{\'page\': track_click}, function(data) {
								$(".load_more").show(); 
								$("#results").append(data);
								$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
								$(\'.animation_image\').hide(); 
								track_click++; 
								}).fail(function(xhr, ajaxOptions, thrownError) { 
									alert(thrownError);
									$(".load_more").show();
									$(\'.animation_image\').hide();
								});
			
							if(track_click >= total_pages){
								$(".load_more").attr("style", "visibility: hidden");
							}
						}
				});
			});</script>';	
		}
	}
