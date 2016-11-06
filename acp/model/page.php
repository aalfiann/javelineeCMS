<?php
	class page {
		public static function route() {
			global $dev;
			session_start();
			include 'acp/controller/route.php';
			
			$case = new page();
			if ($dev['maintenance'] == "false")
			{
				if ($dev['suspended'] == "true")
				{
					route::basedefault("suspended");
					$case->mypage(route::acp('suspended.php'));
				}
				else
				{
					route::basedefault();
					$case->mypagedefault();
				}	
			}
			else
			{
				if ($dev['suspended'] == "true")
				{
					route::basedefault("suspended");
					$case->mypage(route::acp('suspended.php'));
				}
				else
				{
					if ($_GET['p'] == "login" || $_GET['p'] == "register") 
					{
						route::basedefault();
						$case->mypagedefault();
					}
					else
					{
						if (empty($_SESSION['username']) || $_SESSION['mode'] != "master")
						{
							route::basedefault("maintenance");
							$case->mypage(route::acp('maintenance.php'));
						}
						else
						{
							route::basedefault();
							$case->mypagedefault();
						}				
					}
				}
			}
		}
		
		private function mypagedefault()
		{
				// Define static route
				if ($_GET['p'] == "home") 				route::theme('index');
					elseif ($_GET['p'] == "page")  		route::theme('page');
					elseif ($_GET['p'] == "read")  		route::theme('read');
					elseif ($_GET['p'] == "tag")  		route::theme('hashtag');
					elseif ($_GET['p'] == "search")  	route::theme('search');
					elseif ($_GET['p'] == "post")  		route::theme('post');
					elseif ($_GET['p'] == "cat")  		route::theme('category');
					elseif ($_GET['p'] == "forum")  	route::theme('forum');
					elseif ($_GET['p'] == "sitemap")  	route::acp('sitemap.php');
					elseif ($_GET['p'] == "rss")  		route::acp('rss.php');
					elseif ($_GET['p'] == "suspended")  route::acp('suspended.php');
					elseif ($_GET['p'] == "tester") 	route::acp('tester.php');
					elseif ($_GET['p'] == "register") 	route::acp('register.php');
					elseif ($_GET['p'] == "login") 		route::acp('login.php');
					elseif ($_GET['p'] == "error")  	route::acp('404.php');
					elseif ($_GET['p'] == "admin")  	route::acp('index.php');
		
				// Error / 404 page will move here (Static route)
				else header("Location: $host/?p=error");
		}

		private function mypage($specialpage)
		{
				// Define static route
				if ($_GET['p'] == "home") 				$specialpage;
					elseif ($_GET['p'] == "page")  		$specialpage;
					elseif ($_GET['p'] == "read")  		$specialpage;
					elseif ($_GET['p'] == "tag")  		$specialpage;
					elseif ($_GET['p'] == "search")  	$specialpage;
					elseif ($_GET['p'] == "post")  		$specialpage;
					elseif ($_GET['p'] == "cat")  		$specialpage;
					elseif ($_GET['p'] == "forum")  	$specialpage;
					elseif ($_GET['p'] == "sitemap")  	$specialpage;
					elseif ($_GET['p'] == "rss")  		$specialpage;
					elseif ($_GET['p'] == "suspended")  $specialpage;
					elseif ($_GET['p'] == "tester")		$specialpage;
					elseif ($_GET['p'] == "register") 	$specialpage;
					elseif ($_GET['p'] == "login") 		$specialpage;
					elseif ($_GET['p'] == "admin") 		$specialpage;
					elseif ($_GET['p'] == "error")  	route::acp('404.php');
				// Error / 404 page will move here (Static route)
				else header("Location: $host/?p=error");
		}
	}
