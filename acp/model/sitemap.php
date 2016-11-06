<?php
	
function GetSitemap() {
		global $seo,$root,$host;
		include $root.'/acp/config.seo.php';
		
	 	$sqlpost  = mysql_query("SELECT id_post,slug FROM post WHERE status_post='published' order by date_post DESC, id_post DESC LIMIT ".$seo['sitemap_limit']."");
		$sqlpage = mysql_query("SELECT id_page,slug FROM page WHERE status_page='published' order by id_page DESC LIMIT ".$seo['sitemap_limit']."");
		$sqlcat = mysql_query("SELECT name_cat_post FROM cat_post order by name_cat_post ASC LIMIT ".$seo['sitemap_limit']."");
	header("Content-type: text/xml");
	echo'<?xml version=\'1.0\' encoding=\'UTF-8\'?>';
	echo'   <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

		if ($sqlpost > 0) {
			while ($string = mysql_fetch_array($sqlpost)){?>
            <url>
                <loc><?= $host ?>?p=read&amp;id=<?= $string['id_post'];?>&amp;s=<?= $string['slug'];?></loc>
                <changefreq>yearly</changefreq>
            </url>
		<?php }} 

		if ($sqlpage > 0) {
			while ($string = mysql_fetch_array($sqlpage)){?>
            <url>
                <loc><?= $host ?>?p=page&amp;id=<?= $string['id_page'];?>&amp;s=<?= $string['slug'];?></loc>
                <changefreq>yearly</changefreq>
            </url>
		<?php }}

		if ($sqlcat > 0) {
			while ($string = mysql_fetch_array($sqlcat)){?>
            <url>
                <loc><?= $host ?>?p=cat&amp;s=<?= $string['name_cat_post'];?></loc>
                <changefreq>daily</changefreq>
            </url>
		<?php }} ?>
			<url>
                <loc><?= $host ?></loc>
                <changefreq>never</changefreq>
        </url>
        <url>
                <loc><?= $host ?>?p=post</loc>
                <changefreq>daily</changefreq>
        </url>
        <url>
                <loc><?= $host ?>?p=forum</loc>
                <changefreq>daily</changefreq>
        </url>
		  <url>
                <loc><?= $host ?>?p=rss</loc>
                <changefreq>daily</changefreq>
        </url>		  
		  <url>
                <loc><?= $host ?>?p=sitemap</loc>
                <changefreq>daily</changefreq>
        </url>
		<?= '</urlset>';         
 }

function GetSitemapClean() {
		global $seo,$root,$host;
		include $root.'/acp/config.seo.php';
		
	 	$sqlpost  = mysql_query("SELECT id_post,slug FROM post WHERE status_post='published' order by date_post DESC, id_post DESC LIMIT ".$seo['sitemap_limit']."");
		$sqlpage = mysql_query("SELECT id_page,slug FROM page WHERE status_page='published' order by id_page DESC LIMIT ".$seo['sitemap_limit']."");
		$sqlcat = mysql_query("SELECT name_cat_post FROM cat_post order by name_cat_post ASC LIMIT ".$seo['sitemap_limit']."");
	header("Content-type: text/xml");
	echo'<?xml version=\'1.0\' encoding=\'UTF-8\'?>';
	echo'   <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

		if ($sqlpost > 0) {
			while ($string = mysql_fetch_array($sqlpost)){?>
            <url>
                <loc><?= $host ?>read/<?= $string['id_post'];?>/<?= $string['slug'];?>.html</loc>
                <changefreq>yearly</changefreq>
            </url>
		<?php }} 

		if ($sqlpage > 0) {
			while ($string = mysql_fetch_array($sqlpage)){?>
            <url>
                <loc><?= $host ?>page/<?= $string['id_page'];?>/<?= $string['slug'];?>.html</loc>
                <changefreq>yearly</changefreq>
            </url>
		<?php }}

		if ($sqlcat > 0) {
			while ($string = mysql_fetch_array($sqlcat)){?>
            <url>
                <loc><?= $host ?>cat/<?= $string['name_cat_post'];?>.html</loc>
                <changefreq>daily</changefreq>
            </url>
		<?php }} ?>
			<url>
                <loc><?= $host ?></loc>
                <changefreq>never</changefreq>
        </url>
        <url>
                <loc><?= $host ?>post.html</loc>
                <changefreq>daily</changefreq>
        </url>
        <url>
                <loc><?= $host ?>forum.html</loc>
                <changefreq>daily</changefreq>
        </url>
		  <url>
                <loc><?= $host ?>rss.html</loc>
                <changefreq>daily</changefreq>
        </url>		  
		  <url>
                <loc><?= $host ?>sitemap.html</loc>
                <changefreq>daily</changefreq>
        </url>
		<?= '</urlset>';         
 }
  ?>