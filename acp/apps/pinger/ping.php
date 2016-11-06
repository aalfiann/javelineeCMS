<?php
class pinger {

	function pingSE($sitemap,$service){
		global $host,$root,$lang;

		switch ($service) {
			case 'bing':
				$ping = "http://www.bing.com/webmaster/ping.aspx?siteMap=$sitemap";
				break;
			case 'ask':
				$ping = "http://submissions.ask.com/ping?sitemap=$sitemap";
				break;
			case 'google':
				$ping = "http://www.google.com/webmasters/sitemaps/ping?sitemap=$sitemap";
				break;
			case 'moreover':
				$ping = "http://api.moreover.com/ping?sitemap=$sitemap";
				break;
			default:
      			return false;
		}
		
		include $root.'acp/model/set.lang.php';	
		$success = file_get_contents($ping);
		if (empty($success)) {echo "<li>$lang[pinger_failed] $service</li>";} else{echo "<li>$lang[pinger_success] $service</li>";}
	}

	function pingRSS($rssfeed,$service){
		global $host,$site,$root,$lang;

		switch ($service) {
			case 'blogsearch':
				$ping = "http://blogsearch.google.com/ping?url=$rssfeed";
				break;
			case 'weblogs':
				$ping = "http://rpc.weblogs.com/pingSiteForm?name=$site[title]&url=$site[url_site]&changesURL=$rssfeed";
				break;
			case 'blogs':
				$ping = "http://ping.blo.gs/?name=$site[title]&url=$site[url_site]&rssUrl=$rssfeed";
				break;
			case 'feedburner':
				$ping = "http://feedburner.google.com/fb/a/pingSubmit?bloglink=$site[url_site]";
				break;
			default:
      			return false;
		}
		
		include $root.'acp/model/set.lang.php';	
		$success = file_get_contents($ping);
		if (empty($success)) {echo "<li>$lang[pinger_failed] $service</li>";} else{echo "<li>$lang[pinger_success] $service</li>";}
	}
}    
?>