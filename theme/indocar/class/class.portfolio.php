<?php

/**
 * Class Portfolio for display all portfolio in Javelinee CMS.
 * 
 * @version: 1.0 / 14 Feb 2015 -> Indocar Theme
 * @author: M ABD AZIZ ALFIAN <aalfiann@gmail.com>
 * @copyright 2014 Javelinee
 * @license: Creative Common License
 * 
 */

	class portfolio {

		private static function NonJava() {
			// Load query For Non Javascript 
				global $portfolio,$datafolio,$queryfolio;

				$queryfolio = "SELECT * FROM media_img, cat_img WHERE media_img.cat_img = cat_img.id_cat_img AND cat_img.view = 'public' ORDER BY media_img.date_upload DESC";
				$portfolio = mysql_query($queryfolio);

				if($portfolio === FALSE) {
            		die(mysql_error()); // TODO: better error handling
        		}
		}

		private static function DefaultQuery(){
			// Load default first query
				global $portfolio;

				$results = "SELECT COUNT(*) FROM media_img, cat_img WHERE media_img.cat_img = cat_img.id_cat_img AND cat_img.view = 'public' ORDER BY media_img.date_upload DESC, media_img.id_img DESC";
				$portfolio = mysql_query($results);

				if($portfolio === FALSE) {
            		die(mysql_error()); // TODO: better error handling
        		}
		}

		private static function LimitQuery($position, $item_per_page){
			//Limit query results within a specified range. 
    			global $portfolio;
    		
	    		$queryfolio = "SELECT * FROM media_img, cat_img WHERE media_img.cat_img = cat_img.id_cat_img AND cat_img.view = 'public' ORDER BY media_img.date_upload DESC, media_img.id_img DESC LIMIT $position, $item_per_page";
    	    	$portfolio = mysql_query($queryfolio);

        		if($portfolio === FALSE) {
            		die(mysql_error()); // TODO: better error handling
        		}
		}

		private static function ProsesReload(){
			// Load more for result proses 
				global $root, $site, $loadmore, $datafolio, $portfolio;

			    include $root.'acp/model/database.php';
    			include $root.'theme/'.$site['theme'].'/info.php';

			    $item_per_page = $loadmore;

    			//sanitize post value
    			$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

    			//throw HTTP error if page number is not valid
    			if(!is_numeric($page_number)){
        			header('HTTP/1.1 500 Invalid page number!');
        			exit();
    			}

		    	//get current starting point of records
    			$position = ($page_number * $item_per_page);

	    		self::LimitQuery($position, $item_per_page);

		}

		public static function Load($item){ // Default Non Java Load
			// Default show portfolio
				global $host,$site,$portfolio,$results,$get_total_rows,$item_per_page,$total_pages;	
			
				$item_per_page = $item;

				self::DefaultQuery();
			
				$get_total_rows = mysql_fetch_array($portfolio);
				$total_pages = ceil($get_total_rows[0]/$item_per_page);

				// Output standar Javascript
				echo "<div id=\"results\"></div>";	
			
				// Output Non Javascript
				echo "<noscript>";
        		self::NonJava();
				while($datafolio = mysql_fetch_array($portfolio)){
			
    					echo'
    						<div class="col-md-4 col-sm-6">
    							<a href="'.$host.$datafolio['url_img'].'" title="'.stripcslashes($datafolio['t_img']).'" target="_blank">
								<img class="img-responsive img-portfolio img-hover" src="'.$host.$datafolio['url_img'].'" alt="'.stripcslashes($datafolio['alt_img']).'"></a>
							</div>';
	            } echo "</noscript>";

    	        // Output button Loadmore
        	    echo'
        	    	<br>
        	    	<div class="text-center">
                    	<button class="btn btn-default load_more" id="load_more_button">Load more</button>
                        <i class="animation_image fa fa-3x fa-spin fa-refresh" style="display:none;"></i>
                    </div>';
		}

		public static function ShowResult(){
			//output results protfolio from loadmore button
				global $host, $datafolio, $portfolio;

				self::ProsesReload();
			
				echo "<center>";
				while($datafolio = mysql_fetch_array($portfolio)){
    			
    				echo '
    					 <div class="col-md-4 col-sm-6">
	    					<a data-toggle="modal" data-target="#PortfolioModal'.$datafolio['id_img'].'" href="#PortfolioModal'.$datafolio['id_img'].'">
						    <img class="img-responsive img-portfolio img-hover" src="'.$host.$datafolio['url_img'].'" alt="'.stripcslashes($datafolio['alt_img']).'"></a></div>
        
        				<!-- Portfolio Modal -->
						<div class="modal fade" id="PortfolioModal'.$datafolio['id_img'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">'.stripcslashes($datafolio['t_img']).'</h4>
									</div>

									<div class="modal-body">
										<img class="img-responsive img-portfolio img-hover" src="'.$host.$datafolio['url_img'].'" alt="'.stripcslashes($datafolio['alt_img']).'"></a>
									</div>
                            
									<div class="modal-footer">
										<a href="'.$host.$datafolio['url_img'].'" target="_blank" class="btn btn-default">View Original</a>
                                		'.(($datafolio['ex_link'] != null)? '<a href="'.$datafolio['ex_link'].'" target="_blank" class="btn btn-success">Visit Link</a>' : null).'
									</div>
								</div>
							</div>
						</div>';
        		
	            } echo "</center>";
		}

		public static function Loadmore(){
			global $host, $site, $total_pages;
		
			echo '<script type="text/javascript">$(document).ready(function() {
				var track_click = 0; 
				var total_pages = '.$total_pages.';
		
				$(\'#results\').load("'.$host.'/theme/'.$site['theme'].'/portfolio.php", {\'page\':track_click}, function() {track_click++;}); 

				$(".load_more").click(function (e) { 
					$(this).hide();
					$(\'.animation_image\').show(); 
						if(track_click <= total_pages){
							$.post("'.$host.'/theme/'.$site['theme'].'/portfolio.php",{\'page\': track_click}, function(data) {
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
?>