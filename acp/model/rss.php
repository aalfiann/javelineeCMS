<?php
function GetRSS() {
	global $root,$seo,$site,$host;
	include $root.'/acp/config.seo.php';
	echo '<?xml version="1.0" encoding="UTF-8"?>  
	<rss version="2.0">  
	<channel>  
	<title>'.$seo['rss_title'].' - '.$site['title'].'</title>  
	<description>'.$seo['rss_descriptions'].' - '.$site['title'].'</description>  
	<link>'.$host.'?p=rss</link>';  
	$get_post = "SELECT id_post, t_post, md_post, slug, DATE_FORMAT(date_post,'%a, %e %b %Y %T') as formatted_date FROM post WHERE status_post='published' ORDER BY date_post DESC, id_post DESC LIMIT ".$seo['rss_limit']."";    
	$posts = mysql_query($get_post);  
		//if (!$posts) IsQueryError();
			if ($posts > 0){  
				while ($post = mysql_fetch_array($posts)){  
    				echo '  
       				<item>  
          			<title>'.$post['t_post'].'</title>  
          			<description><![CDATA[  
         				'.$post['md_post'].'  
          				]]></description>  
          			<link>'.$host.'?p=read&amp;id='.$post['id_post'].'&amp;s='.$post['slug'].'</link>  
          			<pubDate>'.$post['formatted_date'].' GMT</pubDate>  
      				</item>';  
				}
			}  
		echo '</channel>  
		</rss>';
}  

function GetRSSClean() {
	global $root,$seo,$site,$host;
	include $root.'/acp/config.seo.php';
	echo '<?xml version="1.0" encoding="UTF-8"?>  
	<rss version="2.0">  
	<channel>  
	<title>'.$seo['rss_title'].' - '.$site['title'].'</title>  
	<description>'.$seo['rss_descriptions'].' - '.$site['title'].'</description>  
	<link>'.$host.'rss.html</link>';  
	$get_post = "SELECT id_post, t_post, md_post, slug, DATE_FORMAT(date_post,'%a, %e %b %Y %T') as formatted_date FROM post WHERE status_post='published' ORDER BY date_post DESC, id_post DESC LIMIT ".$seo['rss_limit']."";    
	$posts = mysql_query($get_post);  
		//if (!$posts) IsQueryError();
			if ($posts > 0){  
				while ($post = mysql_fetch_array($posts)){  
    				echo '  
       				<item>  
          			<title>'.$post['t_post'].'</title>  
          			<description><![CDATA[  
         				'.$post['md_post'].'  
          				]]></description>  
          			<link>'.$host.'read/'.$post['id_post'].'/'.$post['slug'].'.html</link>  
          			<pubDate>'.$post['formatted_date'].' GMT</pubDate>  
      				</item>';  
				}
			}  
		echo '</channel>  
		</rss>';
}  