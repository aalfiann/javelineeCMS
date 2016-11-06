<?php
function ogHomeFacebook() {
	include 'og.fb.php';
	if ($opengraph['og_title'] != null ) echo "<meta property=\"og:title\" content=\"".$opengraph['og_title']."\">";
	if ($opengraph['og_site'] != null ) echo "<meta property=\"og:site_name\" content=\"".$opengraph['og_site']."\">";
	if ($opengraph['og_type'] != null ) echo "<meta property=\"og:type\" content=\"".$opengraph['og_type']."\">";
	if ($opengraph['og_image'] != null ) echo "<meta property=\"og:image\" content=\"".$opengraph['og_image']."\">";
	if ($opengraph['og_url'] != null ) echo "<meta property=\"og:url\" content=\"".$opengraph['og_url']."\">";
	if ($opengraph['og_description'] != null ) echo "<meta property=\"og:description\" content=\"".$opengraph['og_description']."\">";
}

function ogHashtagFacebook() {
	global $host;
	global $sseo;
	include 'og.fb.php';
	if ($opengraph['content_page'] != null) {
		echo "<meta property=\"og:title\" content=\"".$sseo['hashtag_meta_title']."\">";
		if ($opengraph['og_site'] != null ) echo "<meta property=\"og:site_name\" content=\"".$opengraph['og_site']."\">";
		if ($opengraph['og_type'] != null ) echo "<meta property=\"og:type\" content=\"".$opengraph['og_type']."\">";
		if ($opengraph['og_image'] != null ) echo "<meta property=\"og:image\" content=\"".$opengraph['og_image']."\">";
		echo "<meta property=\"og:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta property=\"og:description\" content=\"".$sseo['hashtag_meta_description']."\">";
	}
}

function ogPageFacebook() {
	include 'og.fb.php';
	if ($opengraph['content_page'] != null) {
		global $host;
		global $data;
		global $seo;
		if ($seo['type_url'] == "clean") {$urlpage = $host."/page/".$data['id_page']."/".$data['slug'].".html";} else {$urlpage = $host."?p=page&amp;id=".$data['id_page']."&amp;s=".$data['slug'];}
			echo "<meta property=\"og:title\" content=\"".$data['t_page']."\">";
			if ($opengraph['og_site'] != null ) echo "<meta property=\"og:site_name\" content=\"".$opengraph['og_site']."\">";
			if ($opengraph['og_type'] != null ) echo "<meta property=\"og:type\" content=\"".$opengraph['og_type']."\">";
			if ($opengraph['og_image'] != null ) echo "<meta property=\"og:image\" content=\"".(($data['img_page'] != null)? $data['img_page']:$opengraph['og_image'])."\">";
			echo "<meta property=\"og:url\" content=\"".$urlpage."\">";
			echo "<meta property=\"og:description\" content=\"".$data['md_page']."\">";
	}
}

function ogReadFacebook() {
	include 'og.fb.php';
	if ($opengraph['content_page'] != null) {
		global $host;
		global $data;
		global $seo;
		if ($seo['type_url'] == "clean") {$urlpage = $host."/read/".$data['id_post']."/".$data['slug'].".html";} else {$urlpage = $host."?p=read&amp;id=".$data['id_post']."&amp;s=".$data['slug'];}
		echo "<meta property=\"og:title\" content=\"".$data['t_post']."\">";
		if ($opengraph['og_site'] != null ) echo "<meta property=\"og:site_name\" content=\"".$opengraph['og_site']."\">";
		if ($opengraph['og_type'] != null ) echo "<meta property=\"og:type\" content=\"".$opengraph['og_type']."\">";
		if ($opengraph['og_image'] != null ) echo "<meta property=\"og:image\" content=\"".(($data['img_post'] != null)? $data['img_post']:$opengraph['og_image'])."\">";
		echo "<meta property=\"og:url\" content=\"".$urlpage."\">";
		echo "<meta property=\"og:description\" content=\"".$data['md_post']."\">";
	}
}

function ogCategoryFacebook() {
	global $host;
	global $sseo;
	include 'og.fb.php';
	if ($opengraph['content_page'] != null) {
		echo "<meta property=\"og:title\" content=\"".$sseo['category_meta_title']."\">";
		if ($opengraph['og_site'] != null ) echo "<meta property=\"og:site_name\" content=\"".$opengraph['og_site']."\">";
		if ($opengraph['og_type'] != null ) echo "<meta property=\"og:type\" content=\"".$opengraph['og_type']."\">";
		if ($opengraph['og_image'] != null ) echo "<meta property=\"og:image\" content=\"".$opengraph['og_image']."\">";
		echo "<meta property=\"og:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta property=\"og:description\" content=\"".$sseo['category_meta_description']."\">";
	}
}

function ogPostFacebook() {
	global $host;
	global $sseo;
	include 'og.fb.php';
	if ($opengraph['content_page'] != null) {
		echo "<meta property=\"og:title\" content=\"".$sseo['post_meta_title']."\">";
		if ($opengraph['og_site'] != null ) echo "<meta property=\"og:site_name\" content=\"".$opengraph['og_site']."\">";
		if ($opengraph['og_type'] != null ) echo "<meta property=\"og:type\" content=\"".$opengraph['og_type']."\">";
		if ($opengraph['og_image'] != null ) echo "<meta property=\"og:image\" content=\"".$opengraph['og_image']."\">";
		echo "<meta property=\"og:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta property=\"og:description\" content=\"".$sseo['post_meta_description']."\">";
	}
}

function ogForumFacebook() {
	global $host;
	global $sseo;
	include 'og.fb.php';
	if ($opengraph['content_page'] != null) {
		echo "<meta property=\"og:title\" content=\"".$sseo['forum_meta_title']."\">";
		if ($opengraph['og_site'] != null ) echo "<meta property=\"og:site_name\" content=\"".$opengraph['og_site']."\">";
		if ($opengraph['og_type'] != null ) echo "<meta property=\"og:type\" content=\"".$opengraph['og_type']."\">";
		if ($opengraph['og_image'] != null ) echo "<meta property=\"og:image\" content=\"".$opengraph['og_image']."\">";
		echo "<meta property=\"og:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta property=\"og:description\" content=\"".$sseo['forum_meta_description']."\">";
	}
}

function ogSearchFacebook() {
	global $host;
	global $sseo;
	include 'og.fb.php';
	if ($opengraph['content_page'] != null) {
		echo "<meta property=\"og:title\" content=\"".$sseo['search_meta_title']."\">";
		if ($opengraph['og_site'] != null ) echo "<meta property=\"og:site_name\" content=\"".$opengraph['og_site']."\">";
		if ($opengraph['og_type'] != null ) echo "<meta property=\"og:type\" content=\"".$opengraph['og_type']."\">";
		if ($opengraph['og_image'] != null ) echo "<meta property=\"og:image\" content=\"".$opengraph['og_image']."\">";
		echo "<meta property=\"og:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta property=\"og:description\" content=\"".$sseo['search_meta_description']."\">";
	}
}

function ogHomeTwitter() {
	include 'og.tw.php';
	if ($opengraph['tw_card'] != null ) echo "<meta name=\"twitter:card\" content=\"".$opengraph['tw_card']."\">";
	if ($opengraph['tw_site'] != null ) echo "<meta name=\"twitter:site\" content=\"".$opengraph['tw_site']."\">";
	if ($opengraph['tw_image'] != null ) echo "<meta name=\"twitter:image\" content=\"".$opengraph['tw_image']."\">";
	if ($opengraph['tw_url'] != null ) echo "<meta name=\"twitter:url\" content=\"".$opengraph['tw_url']."\">";
	if ($opengraph['tw_title'] != null ) echo "<meta name=\"twitter:title\" content=\"".$opengraph['tw_title']."\">";
	if ($opengraph['tw_description'] != null ) echo "<meta name=\"twitter:description\" content=\"".$opengraph['tw_description']."\">";
}

function ogHashtagTwitter() {
	global $host;
	global $sseo;
	include 'og.tw.php';
	if ($opengraph['tw_content_page'] != null) {
		if ($opengraph['tw_card'] != null ) echo "<meta name=\"twitter:card\" content=\"".$opengraph['tw_card']."\">";
		if ($opengraph['tw_site'] != null ) echo "<meta name=\"twitter:site\" content=\"".$opengraph['tw_site']."\">";
		if ($opengraph['tw_image'] != null ) echo "<meta name=\"twitter:image\" content=\"".$opengraph['tw_image']."\">";
		echo "<meta name=\"twitter:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta name=\"twitter:title\" content=\"".$sseo['hashtag_meta_title']."\">";
		echo "<meta name=\"twitter:description\" content=\"".$sseo['hashtag_meta_description']."\">";
	}
}

function ogPageTwitter() {
	include 'og.tw.php';
	if ($opengraph['tw_content_page'] != null) {
		global $host;
		global $data;
		global $seo;
		if ($opengraph['tw_card'] != null ) echo "<meta name=\"twitter:card\" content=\"".$opengraph['tw_card']."\">";
		if ($opengraph['tw_site'] != null ) echo "<meta name=\"twitter:site\" content=\"".$opengraph['tw_site']."\">";
		if ($opengraph['tw_image'] != null ) echo "<meta name=\"twitter:image\" content=\"".(($data['img_page'] != null)? $data['img_page']:$opengraph['tw_image'])."\">";
		echo "<meta name=\"twitter:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta name=\"twitter:title\" content=\"".$data['t_page']."\">";
		echo "<meta name=\"twitter:description\" content=\"".$data['md_page']."\">";
	}
}

function ogReadTwitter() {
	include 'og.tw.php';
	if ($opengraph['tw_content_page'] != null) {
		global $host;
		global $data;
		global $seo;
		if ($opengraph['tw_card'] != null ) echo "<meta name=\"twitter:card\" content=\"".$opengraph['tw_card']."\">";
		if ($opengraph['tw_site'] != null ) echo "<meta name=\"twitter:site\" content=\"".$opengraph['tw_site']."\">";
		if ($opengraph['tw_image'] != null ) echo "<meta name=\"twitter:image\" content=\"".(($data['img_post'] != null)? $data['img_post']:$opengraph['tw_image'])."\">";
		echo "<meta name=\"twitter:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta name=\"twitter:title\" content=\"".$data['t_post']."\">";
		echo "<meta name=\"twitter:description\" content=\"".$data['md_post']."\">";
	}
}

function ogCategoryTwitter() {
	include 'og.tw.php';
	if ($opengraph['tw_content_page'] != null) {
		global $host;
		global $sseo;
		if ($opengraph['tw_card'] != null ) echo "<meta name=\"twitter:card\" content=\"".$opengraph['tw_card']."\">";
		if ($opengraph['tw_site'] != null ) echo "<meta name=\"twitter:site\" content=\"".$opengraph['tw_site']."\">";
		if ($opengraph['tw_image'] != null ) echo "<meta name=\"twitter:image\" content=\"".$opengraph['tw_image']."\">";
		echo "<meta name=\"twitter:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta name=\"twitter:title\" content=\"".$sseo['category_meta_title']."\">";
		echo "<meta name=\"twitter:description\" content=\"".$sseo['category_meta_description']."\">";	
	}
}

function ogPostTwitter() {
	include 'og.tw.php';
	if ($opengraph['tw_content_page'] != null) {
		global $host;
		global $sseo;
		if ($opengraph['tw_card'] != null ) echo "<meta name=\"twitter:card\" content=\"".$opengraph['tw_card']."\">";
		if ($opengraph['tw_site'] != null ) echo "<meta name=\"twitter:site\" content=\"".$opengraph['tw_site']."\">";
		if ($opengraph['tw_image'] != null ) echo "<meta name=\"twitter:image\" content=\"".$opengraph['tw_image']."\">";
		echo "<meta name=\"twitter:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta name=\"twitter:title\" content=\"".$sseo['post_meta_title']."\">";
		echo "<meta name=\"twitter:description\" content=\"".$sseo['post_meta_description']."\">";	
	}
}

function ogForumTwitter() {
	include 'og.tw.php';
	if ($opengraph['tw_content_page'] != null) {
		global $host;
		global $sseo;
		if ($opengraph['tw_card'] != null ) echo "<meta name=\"twitter:card\" content=\"".$opengraph['tw_card']."\">";
		if ($opengraph['tw_site'] != null ) echo "<meta name=\"twitter:site\" content=\"".$opengraph['tw_site']."\">";
		if ($opengraph['tw_image'] != null ) echo "<meta name=\"twitter:image\" content=\"".$opengraph['tw_image']."\">";
		echo "<meta name=\"twitter:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta name=\"twitter:title\" content=\"".$sseo['forum_meta_title']."\">";
		echo "<meta name=\"twitter:description\" content=\"".$sseo['forum_meta_description']."\">";	
	}
}

function ogSearchTwitter() {
	include 'og.tw.php';
	if ($opengraph['tw_content_page'] != null) {
		global $host;
		global $sseo;
		if ($opengraph['tw_card'] != null ) echo "<meta name=\"twitter:card\" content=\"".$opengraph['tw_card']."\">";
		if ($opengraph['tw_site'] != null ) echo "<meta name=\"twitter:site\" content=\"".$opengraph['tw_site']."\">";
		if ($opengraph['tw_image'] != null ) echo "<meta name=\"twitter:image\" content=\"".$opengraph['tw_image']."\">";
		echo "<meta name=\"twitter:url\" content=\"http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."\">";
		echo "<meta name=\"twitter:title\" content=\"".$sseo['search_meta_title']."\">";
		echo "<meta name=\"twitter:description\" content=\"".$sseo['search_meta_description']."\">";	
	}
}

function oEmbed(){
	global $site;
	echo "<link rel=\"alternate\" href=\"http://open.iframe.ly/api/oembed?url=http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."&origin=".$site['title']."\" type=\"application/json+oembed\">";
	echo "<link rel=\"alternate\" href=\"http://open.iframe.ly/api/oembed?url=http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]."&origin=".$site['title']."&format=xml\" type=\"application/xml+oembed\">";
}