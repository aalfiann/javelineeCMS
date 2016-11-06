<?php
 
/**
 * All function inside Java class is only parsing from php to javascript on theme.
 * 
 * @version: 1.0 / 14 Feb 2015 -> Indocar Theme
 * @author: M ABD AZIZ ALFIAN <aalfiann@gmail.com>
 * @copyright 2014 Javelinee
 * @license: Creative Common License
 * 
 */

	class java extends theme {

		public static function init(){
			echo '<script>(function($) {

					skel.init({
						reset: \'full\',
						breakpoints: {
							global: { href: \''.self::urls('css/style.css').'\', containers: \'45em\', grid: { gutters: { vertical: \'2em\', horizontal: 0 } } },
							xlarge: { media: \'(max-width: 1680px)\', href: \''.self::urls('css/style-xlarge.css').'\' },
							large: { media: \'(max-width: 1280px)\', href: \''.self::urls('css/style-large.css').'\', containers: \'42em\', grid: { gutters: { vertical: \'1.5em\' } }, viewport: { scalable: false } },
							medium: { media: \'(max-width: 1024px)\', href: \''.self::urls('css/style-medium.css').'\', containers: \'85%\', grid: { collapse: 1 } },
							small: { media: \'(max-width: 736px)\', href: \''.self::urls('css/style-small.css').'\', containers: \'90%\', grid: { gutters: { vertical: \'1.25em\' } } },
							xsmall: { media: \'(max-width: 480px)\', href: \''.self::urls('css/style-xsmall.css').'\', grid: { collapse: 2 } }
						},
						plugins: {
							layers: {
								titleBar: {
									breakpoints: \'medium\',
									width: \'100%\',
									height: 44,
									position: \'top-left\',
									side: \'top\',
									html: \'<span class="toggle" data-action="toggleLayer" data-args="sidePanel"></span><span class="title" data-action="copyText" data-args="logo"></span>\'
								},
								sidePanel: {
									breakpoints: \'medium\',
									hidden: true,
									width: { small: 275, medium: \'20em\' },
									height: \'100%\',
									animation: \'pushX\',
									position: \'top-right\',
									side: \'right\',
									orientation: \'vertical\',
									clickToHide: true,
									html: \'<div data-action="moveElement" data-args="header"></div>\'
								}
							}
						}
					});

					$(function() {
		
						var $body = $(\'body\'),
						$header = $(\'#header\'),
						$nav = $(\'#nav\'), $nav_a = $nav.find(\'a\'),
						$wrapper = $(\'#wrapper\');

						// Forms (IE<10).
						var $form = $(\'form\');
						if ($form.length > 0) {
				
							$form.find(\'.form-button-submit\')
								.on(\'click\', function() {
									$(this).parents(\'form\').submit();
									return false;
								});
		
							if (skel.vars.IEVersion < 10) {
								$.fn.n33_formerize=function(){var _fakes=new Array(),_form = $(this);_form.find(\'input[type=text],textarea\').each(function() { var e = $(this); if (e.val() == \'\' || e.val() == e.attr(\'placeholder\')) { e.addClass(\'formerize-placeholder\'); e.val(e.attr(\'placeholder\')); } }).blur(function() { var e = $(this); if (e.attr(\'name\').match(/_fakeformerizefield$/)) return; if (e.val() == \'\') { e.addClass(\'formerize-placeholder\'); e.val(e.attr(\'placeholder\')); } }).focus(function() { var e = $(this); if (e.attr(\'name\').match(/_fakeformerizefield$/)) return; if (e.val() == e.attr(\'placeholder\')) { e.removeClass(\'formerize-placeholder\'); e.val(\'\'); } }); _form.find(\'input[type=password]\').each(function() { var e = $(this); var x = $($(\'<div>\').append(e.clone()).remove().html().replace(/type="password"/i, \'type="text"\').replace(/type=password/i, \'type=text\')); if (e.attr(\'id\') != \'\') x.attr(\'id\', e.attr(\'id\') + \'_fakeformerizefield\'); if (e.attr(\'name\') != \'\') x.attr(\'name\', e.attr(\'name\') + \'_fakeformerizefield\'); x.addClass(\'formerize-placeholder\').val(x.attr(\'placeholder\')).insertAfter(e); if (e.val() == \'\') e.hide(); else x.hide(); e.blur(function(event) { event.preventDefault(); var e = $(this); var x = e.parent().find(\'input[name=\' + e.attr(\'name\') + \'_fakeformerizefield]\'); if (e.val() == \'\') { e.hide(); x.show(); } }); x.focus(function(event) { event.preventDefault(); var x = $(this); var e = x.parent().find(\'input[name=\' + x.attr(\'name\').replace(\'_fakeformerizefield\', \'\') + \']\'); x.hide(); e.show().focus(); }); x.keypress(function(event) { event.preventDefault(); x.val(\'\'); }); });  _form.submit(function() { $(this).find(\'input[type=text],input[type=password],textarea\').each(function(event) { var e = $(this); if (e.attr(\'name\').match(/_fakeformerizefield$/)) e.attr(\'name\', \'\'); if (e.val() == e.attr(\'placeholder\')) { e.removeClass(\'formerize-placeholder\'); e.val(\'\'); } }); }).bind("reset", function(event) { event.preventDefault(); $(this).find(\'select\').val($(\'option:first\').val()); $(this).find(\'input,textarea\').each(function() { var e = $(this); var x; e.removeClass(\'formerize-placeholder\'); switch (this.type) { case \'submit\': case \'reset\': break; case \'password\': e.val(e.attr(\'defaultValue\')); x = e.parent().find(\'input[name=\' + e.attr(\'name\') + \'_fakeformerizefield]\'); if (e.val() == \'\') { e.hide(); x.show(); } else { e.show(); x.hide(); } break; case \'checkbox\': case \'radio\': e.attr(\'checked\', e.attr(\'defaultValue\')); break; case \'text\': case \'textarea\': e.val(e.attr(\'defaultValue\')); if (e.val() == \'\') { e.addClass(\'formerize-placeholder\'); e.val(e.attr(\'placeholder\')); } break; default: e.val(e.attr(\'defaultValue\')); break; } }); window.setTimeout(function() { for (x in _fakes) _fakes[x].trigger(\'formerize_sync\'); }, 10); }); return _form; };
								$form.n33_formerize();
							}

						}
			
						// Header.
						var ids = [];

						// Set up nav items.
						$nav_a
							.scrolly()
							.on(\'click\', function(event) {
						
								var $this = $(this),
								href = $this.attr(\'href\');
						
								// Not an internal link? Bail.
								if (href.charAt(0) != \'#\')
									return;
						
								// Prevent default behavior.
									event.preventDefault();
						
								// Remove active class from all links and mark them as locked (so scrollzer leaves them alone).
									$nav_a
										.removeClass(\'active\')
										.addClass(\'scrollzer-locked\');
					
								// Set active class on this link.
									$this.addClass(\'active\');
					
						})
							.each(function() {
					
								var $this = $(this),
								href = $this.attr(\'href\'),
								id;
						
								// Not an internal link? Bail.
									if (href.charAt(0) != \'#\')
										return;
						
								// Add to scrollzer ID list.
									id = href.substring(1);
									$this.attr(\'id\', id + \'-link\');
									ids.push(id);
						
							});
			
					// Initialize scrollzer.
					$.scrollzer(ids, { pad: 300, lastHack: true });
		
				});

			})(jQuery);</script>';
		}

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
