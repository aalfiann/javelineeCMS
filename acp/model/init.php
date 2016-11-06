<?php

/* This is default function logic for all default theme page Javelinee.
This function logic maybe won't work on your custom theme.
*/

// List new post	
function NewPost() {
	global $site,$host,$data,$noPage,$lang,$lang_file,$root;
	
	include $root.'/acp/model/set.lang.php';
	
	// jumlah data yang akan ditampilkan per halaman
	$dataPerPage = 5;

	// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
	// sedangkan apabila belum, nomor halamannya 1.

	if(isset($_GET['page']))
	{
    $noPage = $_GET['page'];
	} 
	else $noPage = 1;

	// perhitungan offset
	$offset = ($noPage - 1) * $dataPerPage;

	// query SQL untuk menampilkan data perhalaman sesuai offset
	$query = "SELECT * FROM post, cat_post WHERE post.cat_post = cat_post.id_cat_post AND status_post='published' order by date_post DESC, id_post DESC LIMIT $offset, $dataPerPage";
	$result = mysql_query($query);
	if (!$result) IsQueryError(); 

	// mencari jumlah semua data dalam tabel 
	$query2   = "SELECT COUNT(post.id_post) AS jumData FROM post, cat_post WHERE post.cat_post = cat_post.id_cat_post AND status_post='published' order by date_post DESC, id_post DESC";
	$hasil2  = mysql_query($query2);
	if (!$hasil2) IsQueryError();
	$data2     = mysql_fetch_array($hasil2);

	$jumData = $data2['jumData'];

	// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
	$jumPage = ceil($jumData/$dataPerPage);
	$nomor = mysql_num_rows($result);
	
		if ($nomor > 0) {
			while($data = mysql_fetch_array($result)) {
				$more = explode("<!--more-->", $data['c_post']);
				echo "<a href=\"".$host."read/$data[id_post]/$data[slug].html\"><h1>$data[t_post]</h1></a>";
				echo stripcslashes($more[0]); if (!empty($more[1])) {echo "<a href=\"".$host."read/$data[id_post]/$data[slug].html\"><h5>$lang[read_more]</h5></a>";}
				echo "<div class=\"pull-right\"><i class=\"fa fa-folder\"></i> <a href=\"".$host."cat/$data[name_cat_post].html\">$data[name_cat_post]</a></div>";
				$names = $data['hash_post'];	
				$named = preg_split( "/[;, @#]/", $names );
					
					foreach($named as $name){
						if ($name != null){echo "<a href=\"".$host."tag/$name.html\">#$name</a> ";}
					}
					echo "<br><hr>";}
	
			echo "<br>";
			echo "<ul class=\"pager\">";
			$min = $noPage-1;
			$plus = $noPage+1;
			if ($noPage > 1) echo "<li class=\"previous\"><a href=\"$_SERVER[PHP_SELF]?p=post&page=$min \">&larr; $lang[newest]</a></li>";
			if (!empty($_GET['page'])) {if ($jumPage > $_GET['page']) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=post&page=$plus \">$lang[older] &rarr;</a></li>";}
			else {if ($nomor >= $dataPerPage) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=post&page=$plus \">$lang[older] &rarr;</a></li>";}	
			echo "</ul>";
		} else {echo "<h5>".$lang['no_post']."</h5>";}
}

// Search Result Hashtag with Pagination
function TagResult() {
	global $site,$host,$data,$noPage,$root;
	
	include $root.'/acp/model/set.lang.php';
	
	if(empty($_GET['s'])) {header("Location: ".$host."/?p=error");}	
	
	// jumlah data yang akan ditampilkan per halaman
	$dataPerPage = 5;

	// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
	// sedangkan apabila belum, nomor halamannya 1.

	if(isset($_GET['page']))
	{
    $noPage = $_GET['page'];
	} 
	else $noPage = 1;

	// perhitungan offset
	$offset = ($noPage - 1) * $dataPerPage;
		
	// query SQL untuk menampilkan data perhalaman sesuai offset
	if(isset($_GET['s']))
	{$hash_post = safe($_GET['s']);}
	else {IsQueryError();}
	$query = "SELECT * FROM post, cat_post WHERE hash_post LIKE '%$hash_post%' AND post.cat_post = cat_post.id_cat_post AND status_post='published' order by date_post DESC, id_post DESC LIMIT $offset, $dataPerPage";
	$result = mysql_query($query);
	if (!$result) IsQueryError(); 

	// mencari jumlah semua data dalam tabel 
	$query2   = "SELECT COUNT(post.id_post) AS jumData FROM post, cat_post WHERE hash_post LIKE '%$hash_post%' AND post.cat_post = cat_post.id_cat_post AND status_post='published' order by date_post DESC, id_post DESC";
	$hasil2  = mysql_query($query2);
	if (!$hasil2) IsQueryError();
	$data2     = mysql_fetch_array($hasil2);

	$jumData = $data2['jumData'];

	// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
	$jumPage = ceil($jumData/$dataPerPage);
	$nomor = mysql_num_rows($result);
	
		if ($nomor > 0) {
			while($data = mysql_fetch_array($result)) { 
				echo "<a href=\"".$host."read/$data[id_post]/$data[slug].html\"><h1>$data[t_post]</h1></a>";
				$more = explode("<!--more-->", $data['c_post']); 
				echo stripcslashes($more[0]); if (!empty($more[1])) {echo "<a href=\"".$host."read/$data[id_post]/$data[slug].html\"><h5>$lang[read_more]</h5></a>";}
				echo "<div class=\"pull-right\"><i class=\"fa fa-folder\"></i> <a href=\"".$host."cat/$data[name_cat_post].html\">$data[name_cat_post]</a></div>";
				$names = $data['hash_post'];	
				$named = preg_split( "/[;, @#]/", $names );
			
					foreach($named as $name){
						if ($name != null){echo "<a href=\"".$host."tag/$name.html\">#$name</a> ";}
						}echo "<br><hr>";}

			echo "<br>";
			echo "<ul class=\"pager\">";
			$min = $noPage-1;
			$plus = $noPage+1;
			if ($noPage > 1) echo "<li class=\"previous\"><a href=\"$_SERVER[PHP_SELF]?p=tag&s=$hash_post&page=$min \">&larr; $lang[newest]</a></li>";
			if (!empty($_GET['page'])) {if ($jumPage > $_GET['page']) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=tag&s=$hash_post&page=$plus \">$lang[older] &rarr;</a></li>";}
			else {if ($nomor >= $dataPerPage) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=tag&s=$hash_post&page=$plus \">$lang[older] &rarr;</a></li>";}
			echo "</ul>";
		} else {echo "<h5>".$lang['no_post']."</h5>";}
}
 	
// List result hashtag (No Pagination)	
function TagList() {
	global $site,$host,$root;

	include $root.'/acp/model/set.lang.php';
	$hash_post = safe($_GET['hash']);
	$queryhash = "SELECT * FROM post, cat_post WHERE post.cat_post = cat_post.id_cat_post AND hash_post LIKE '%$hash_post%' AND status_post='published'";
	$hasilhash = mysql_query($queryhash);
	if (mysql_num_rows($hasilhash) > 0) {
									while($row = mysql_fetch_row($hasilhash)) { 
										echo "<a href=\"$_SERVER[PHP_SELF]?p=read&id=$row[0]&s=$row[5]\"><h1>$row[1]</h1></a>";
										$more = explode("<!--more-->", $row[2]); echo stripcslashes($more[0]); if ($more[1] != NULL) {echo "<a href=\"$_SERVER[PHP_SELF]?p=read&id=$row[0]&s=$row[5]\"><h5>$lang[read_more]</h5></a>";}
										echo "<div class=\"pull-right\"><a href=\"$_SERVER[PHP_SELF]?p=cat&s=$row[12]\">$row[12]</a> | $row[9]</div>";
										$names = $row[4];	
										$named = preg_split( "/[;, @#]/", $names );
											foreach($named as $name){
												if ($name != null){echo "<a href=\"$_SERVER[PHP_SELF]?p=tag&hash=$name\">#$name</a> ";}
											}echo "<br><hr>";}
									} else { echo "<h1>Ups, there is no result found here</h1>";}
}

// Search Result Categories with Pagination
function CatResult() {
	global $site,$host,$data,$noPage,$root;
	
	include $root.'/acp/model/set.lang.php';
	
	if(empty($_GET['s'])) {header("Location: ".$host."/?p=error");}	
	
	// jumlah data yang akan ditampilkan per halaman
	$dataPerPage = 5;

	// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
	// sedangkan apabila belum, nomor halamannya 1.

	if(isset($_GET['page']))
	{
    $noPage = $_GET['page'];
	} 
	else $noPage = 1;

	// perhitungan offset
	$offset = ($noPage - 1) * $dataPerPage;
		
	// query SQL untuk menampilkan data perhalaman sesuai offset
	if(isset($_GET['s']))
	{$cat_post = safe($_GET['s']);}
	else {IsQueryError();}
	$query = "SELECT * FROM post, cat_post WHERE name_cat_post LIKE '%$cat_post%' AND post.cat_post = cat_post.id_cat_post AND status_post='published' order by date_post DESC, id_post DESC LIMIT $offset, $dataPerPage";
	$result = mysql_query($query);
	if (!$result) IsQueryError(); 

	// mencari jumlah semua data dalam tabel 
	$query2   = "SELECT COUNT(post.id_post) AS jumData FROM post, cat_post WHERE name_cat_post LIKE '%$cat_post%' AND post.cat_post = cat_post.id_cat_post AND status_post='published' order by date_post DESC, id_post DESC";
	$hasil2  = mysql_query($query2);
	if (!$hasil2) IsQueryError();
	$data2     = mysql_fetch_array($hasil2);

	$jumData = $data2['jumData'];

	// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
	$jumPage = ceil($jumData/$dataPerPage);
	$nomor = mysql_num_rows($result);
	
		if ($nomor > 0){
			while($data = mysql_fetch_array($result)) { 
				echo "<a href=\"".$host."read/$data[id_post]/$data[slug].html\"><h1>$data[t_post]</h1></a>";
				$more = explode("<!--more-->", $data['c_post']); echo stripcslashes($more[0]); if (!empty($more[1])) {echo "<a href=\"".$host."read/$data[id_post]/$data[slug].html\"><h5>$lang[read_more]</h5></a>";}
				echo "<div class=\"pull-right\"><i class=\"fa fa-folder\"></i> <a href=\"".$host."cat/$data[name_cat_post].html\">$data[name_cat_post]</a></div>";
				$names = $data['hash_post'];	
				$named = preg_split( "/[;, @#]/", $names );
				
					foreach($named as $name){
						if ($name != null){echo "<a href=\"".$host."tag/$name.html\">#$name</a> ";}
						}echo "<br><hr>";}
	
			echo "<br>";
			echo "<ul class=\"pager\">";
			$min = $noPage-1;
			$plus = $noPage+1;
			if ($noPage > 1) echo "<li class=\"previous\"><a href=\"$_SERVER[PHP_SELF]?p=cat&s=$cat_post&page=$min \">&larr; $lang[newest]</a></li>";
			if (!empty($_GET['page'])) {if ($jumPage > $_GET['page']) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=cat&s=$cat_post&page=$plus \">$lang[older] &rarr;</a></li>";}
			else {if ($nomor >= $dataPerPage) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=cat&s=$cat_post&page=$plus \">$lang[older] &rarr;</a></li>";}
			echo "</ul>";
		} else {echo "<h5>".$lang['no_post']."</h5>";}
}

// Search Result Title with Pagination
function TitleResult() {
	global $site,$host,$data,$noPage,$root;
	
	include $root.'/acp/model/set.lang.php';
	
	if(empty($_GET['s'])) {header("Location: ".$host."/?p=error");}	
	
	// jumlah data yang akan ditampilkan per halaman
	$dataPerPage = 5;

	// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
	// sedangkan apabila belum, nomor halamannya 1.

	if(isset($_GET['page']))
	{
    $noPage = $_GET['page'];
	} 
	else $noPage = 1;

	// perhitungan offset
	$offset = ($noPage - 1) * $dataPerPage;
		
	// query SQL untuk menampilkan data perhalaman sesuai offset
	if(isset($_GET['s']))
	{$search_post = safe($_GET['s']);}
	else {IsQueryError();}
	$query = "SELECT * FROM post, cat_post WHERE t_post LIKE '%$search_post%' AND post.cat_post = cat_post.id_cat_post AND status_post='published' order by date_post DESC, id_post DESC LIMIT $offset, $dataPerPage";
	$result = mysql_query($query);
	if (!$result) IsQueryError(); 

	// mencari jumlah semua data dalam tabel 
	$query2   = "SELECT COUNT(post.id_post) AS jumData FROM post, cat_post WHERE t_post LIKE '%$search_post%' AND post.cat_post = cat_post.id_cat_post AND status_post='published' order by date_post DESC, id_post DESC";
	$hasil2  = mysql_query($query2);
	if (!$hasil2) IsQueryError();
	$data2     = mysql_fetch_array($hasil2);

	$jumData = $data2['jumData'];

	// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
	$jumPage = ceil($jumData/$dataPerPage);
	$nomor = mysql_num_rows($result);
	
		if ($nomor > 0) {
			while($data = mysql_fetch_array($result)) { 
				echo "<a href=\"".$host."read/$data[id_post]/$data[slug].html\"><h1>$data[t_post]</h1></a>";
				$more = explode("<!--more-->", $data['c_post']); echo stripcslashes($more[0]); if (!empty($more[1])) {echo "<a href=\"".$host."read/$data[id_post]/$data[slug].html\"><h5>$lang[read_more]</h5></a>";}
				echo "<div class=\"pull-right\"><i class=\"fa fa-folder\"></i> <a href=\"".$host."cat/$data[name_cat_post].html\">$data[name_cat_post]</a></div>";
				$names = $data['hash_post'];	
				$named = preg_split( "/[;, @#]/", $names );
			
					foreach($named as $name){
						if ($name != null){echo "<a href=\"".$host."tag/$name.html\">#$name</a> ";}
						}echo "<br><hr>";}
	
			echo "<br>";
			echo "<ul class=\"pager\">";
			$min = $noPage-1;
			$plus = $noPage+1;
			if ($noPage > 1) echo "<li class=\"previous\"><a href=\"$_SERVER[PHP_SELF]?p=search&s=$search_post&page=$min \">&larr; $lang[newest]</a></li>";
			if (!empty($_GET['page'])) {if ($jumPage > $_GET['page']) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=search&s=$search_post&page=$plus \">$lang[older] &rarr;</a></li>";}
			else {if ($nomor >= $dataPerPage) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=search&s=$search_post&page=$plus \">$lang[older] &rarr;</a></li>";}
			echo "</ul>";
		} else {echo "<h5>".$lang['search_not_found']."</h5>";}
}

// Reading Full Post No Pagination
function ReadPost() {
	global $site,$host,$comment;
	
	
		$id_post = safe($_GET['id']);
		$query = "SELECT * FROM post, cat_post, user_info WHERE post.cat_post = cat_post.id_cat_post AND post.username = user_info.username AND id_post='$id_post' AND status_post='published'";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$timestamp = strtotime($data['date_post']);
		if (empty($_SESSION['lang']))
		{
			$formatdate = indonesian_date($timestamp);
		}
		else 
		{
			$formatdate = ($_SESSION['lang'] == "id")? indonesian_date($timestamp):date('j F Y h:i:s A', $timestamp);
		}

		echo "<a href=\"".$host."read/".$data['id_post']."/".$data['slug'].".html\"><h1>".stripcslashes($data['t_post'])."</h1></a>";
		echo "<h6><i class=\"fa fa-calendar\"></i> ".$formatdate." <i class=\"fa fa-user\"></i> "; if ($data['google'] != null) {echo "<a href=\"".$data['google']."\" rel=\"me\" target=\"_blank\">".$data['username']."</a>";} else {echo $data['username'];}; if ($comment['disqus'] != null) {echo countcomment();} echo "</h6>";
		echo "<br>";
		echo	stripcslashes($data['c_post']);
		echo "<br>";
		echo "<div class=\"pull-right\"><i class=\"fa fa-folder\"></i> <a href=\"".$host."cat/$data[name_cat_post].html\">$data[name_cat_post]</a></div>";		
		
		$names = $data['hash_post'];			
		$named = preg_split( "/[;, @#]/", $names );
								foreach($named as $name){
								
									if ($name != null){
									echo "<a href=\"".$host."tag/$name.html\">#$name</a> ";
									}									
							} echo "<br>";
		//Count Visitor
		$queryvisitor = "UPDATE post SET post.view='".($data[view] + 1)."', post.update_view=current_timestamp where post.id_post='".$id_post."';";
		$hasilvisitor = mysql_query($queryvisitor);
}

// Call Query database read
if(isset($_GET['p'])) {if($_GET['p'] == "read"){
	$id_post = safe($_GET['id']);
	$query = "SELECT * FROM post where id_post='$id_post' AND status_post='published'";
	$hasil = mysql_query($query);
	$data  = mysql_fetch_array($hasil);
		if ($data['t_post'] == null) header("Location: $host/?p=error");
	}
}

// Call Query database page
function GetPage(){
	global $host,$data;
	
	if(isset($_GET['p'])) {if($_GET['p'] == "page"){
	$id_page = safe($_GET['id']);
	$query = "SELECT * FROM page where id_page='$id_page' AND status_page='published'";
	$hasil = mysql_query($query);
	$data  = mysql_fetch_array($hasil);
		}
	}
}

function DataPage(){
	global $host,$data;
	
	if ($data['t_page'] == null) header("Location: $host/?p=error");
		echo "<h1 class=\"page-header\"><a href=\"".$host."page/".$data['id_page']."/".$data['slug'].".html\">".stripcslashes($data['t_page'])."</a>";
                echo "</h1>";
		echo stripcslashes($data['c_page']);
}

// Show list enabled widget
function widget() {
 $widgetquery = "SELECT * FROM widget where status_widget='enabled' ORDER BY position ASC";
							$hasilquery = mysql_query($widgetquery);						
								if (mysql_num_rows($hasilquery) > 0) {
									while($row = mysql_fetch_row($hasilquery)) {
										if($row != null) {echo "<h5>$row[1]</h5>";} 
										echo stripcslashes($row[2]);
										}
									echo "<br>";
								}		
}

// List populer on the week
function ListPopuler(){
	global $host,$root,$lang;
	include $root.'/acp/model/set.lang.php';
	$QueryPopuler = "SELECT a.id_post,a.slug,a.t_post 
		FROM post a
		WHERE a.update_view between DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
		ORDER BY a.`view` DESC
		LIMIT 7;";
	$listpopuler = mysql_query($QueryPopuler);			
		if (!$listpopuler) { die('Invalid query: ' . mysql_error());}			
			if (mysql_num_rows($listpopuler) > 0) {
				echo "<h5>".$lang['populer']."</h5>";
				echo "<ul class=\"list-group\">";
					while($data = mysql_fetch_array($listpopuler)) {
    						echo "<li class=\"list-group-item\">";
							echo "<span class=\"glyphicon glyphicon-share-alt\"></span> <a href=\"".$host."read/$data[id_post]/$data[slug].html\">$data[t_post]</a>";
    						echo "</li>";
  					}
				echo "</ul>";
			}
}

// List Categories
function ListCategory(){
	global $host,$root,$lang;
	include $root.'/acp/model/set.lang.php';
	$QueryCatCategory = "SELECT a.name_cat_post FROM cat_post a ORDER BY a.name_cat_post ASC";
	$listcatquery = mysql_query($QueryCatCategory);			
		if (!$listcatquery) { die('Invalid query: ' . mysql_error());}			
			if (mysql_num_rows($listcatquery) > 0) {
				echo "<h5>".$lang['category']."</h5>";
				echo "<ul class=\"list-group\">";
					while($data = mysql_fetch_array($listcatquery)) {
    					$QueryArtikelCategory = "SELECT cat_post.name_cat_post FROM post, cat_post WHERE name_cat_post='".stripcslashes($data['name_cat_post'])."' AND post.cat_post = cat_post.id_cat_post AND status_post='published'";
    					$resultartikel = mysql_query($QueryArtikelCategory);
    					if (!$resultartikel) { die('Invalid query: ' . mysql_error());}
    						if (mysql_num_rows($resultartikel) > 0) {
    							echo "<li class=\"list-group-item\">";
    							echo "<span class=\"badge\">".mysql_num_rows($resultartikel)."</span>";
    							echo "<a href=\"".$host."cat/".stripcslashes($data['name_cat_post']).".html\">".stripcslashes($data['name_cat_post'])."</a>";
  								echo "</li>";
  							}
  					}
				echo "</ul>";
			}
}

// About Me
function AboutMe() {
	global $root,$lang;
	include $root.'/acp/model/set.lang.php';
	$aquery = "SELECT user_info.aboutme,user_info.showme FROM post,user_info where id_post='".mysql_real_escape_string($_GET['id'])."' AND post.username = user_info.username";
	$ahasil = mysql_query($aquery);
	$noahasil = mysql_num_rows($ahasil);
	$adata = mysql_fetch_array($ahasil);
		if ($noahasil > 0) {
			if ($adata['showme'] == "1") echo "<script src=\"//about.me/embed/".$adata['aboutme']."\"></script>";
		}
}

// Show Meta Seo
function GetMeta() {
	global $seo,$root,$site;
	include $root.'/acp/config.seo.php';
	if ($site['author'] != null) echo "<meta name=\"author\" content=\"$site[author]\" >";
	if ($site['copyright'] != null) echo "<meta name=\"copyright\" content=\"$site[copyright]\" ><meta name=\"generator\" content=\"CMS Javelinee\" >";
	if ($seo['author'] != null) {echo "<link rel=\"publisher\" href=\"$seo[author]\">"; 
		if (empty($_GET) or $_GET['p'] != "read") {echo "<link rel=\"author\" href=\"$seo[author]\">";} 
			else {
				$iquery = "SELECT user_info.google FROM post,user_info where id_post='".mysql_real_escape_string($_GET['id'])."' AND post.username = user_info.username";
				$ihasil = mysql_query($iquery);
				$nohasil = mysql_num_rows($ihasil);
				$idata  = mysql_fetch_array($ihasil);
					if ($nohasil > 0 ) {
						if ($idata['google'] != null) {echo "<link rel=\"author\" href=\"".$idata['google']."\">";}
							else{echo "<link rel=\"author\" href=\"".$seo['author']."\">";}
					} else {echo "<link rel=\"author\" href=\"".$seo['author']."\">";}
			}
	}
	if ($seo['alexa_webmaster'] != null) echo "<meta name=\"alexaVerifyID\" content=\"$seo[alexa_webmaster]\" >";
	if ($seo['google_webmaster'] != null) echo "<meta name=\"google-site-verification\" content=\"$seo[google_webmaster]\" >";
	if ($seo['bing_webmaster'] != null) echo "<meta name=\"msvalidate.01\" content=\"$seo[bing_webmaster]\" >";
	if ($seo['pinterest_webmaster'] != null) echo "<meta name=\"p:domain_verify\" content=\"$seo[pinterest_webmaster]\" >";
	if ($seo['twitter_webmaster'] != null) echo "<meta property=\"twitter:account_id\" content=\"$seo[twitter_webmaster]\" >";
	if ($seo['yandex_webmaster'] != null) echo "<meta name=\"yandex-verification\" content=\"$seo[yandex_webmaster]\" >";
	if ($seo['spider'] == "index,follow") echo "<meta name=\"robots\" content=\"index,follow\" >"; else echo "<meta name=\"robots\" content=\"noindex,nofollow\">";	
}

// Show Zopim Live Chat
function GetZopim() {
	global $seo,$root;
	
	$embedfile = $root.'/acp/apps/zopim/embed.php';
	if (filesize($embedfile) > 0) {include $root.'/acp/apps/zopim/embed.php';}
}

function ShareCode() {
	global $seo,$root;
	
	include $root.'/acp/config.seo.php';
	if ($seo['share_this'] != null) echo "<script type=\"text/javascript\">var switchTo1x=true;</script>
<script type=\"text/javascript\" src=\"http://w.sharethis.com/button/buttons.js\"></script>
<script type=\"text/javascript\">stLight.options({publisher: \"$seo[share_this]\", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>";
}

function ShareThis() {
	global $seo,$root;
	
	include $root.'/acp/config.seo.php';
	if ($seo['share_this'] != null) echo "<span class='st_sharethis' displayText='ShareThis'></span>
<span class='st_facebook' displayText='Facebook'></span>
<span class='st_twitter' displayText='Tweet'></span>
<span class='st_linkedin' displayText='LinkedIn'></span>
<span class='st_pinterest' displayText='Pinterest'></span>
<span class='st_email' displayText='Email'></span>";
}

//Google Analytics
function GA2() {
	global $seo,$root;
	
	include $root.'/acp/config.seo.php';
	if ($seo['google_analytics'] != null) {
	echo "<script type=\"text/javascript\">";
	echo "var _gaq = _gaq || [];";
	echo "gaq.push(['_setAccount', '$seo[google_analytics]']);";
	echo "_gaq.push(['_trackPageview']);";
	echo "(function() {";
	echo "var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;";
	echo "ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';";
	echo "var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);";
	echo "})();";
	echo "</script>";}
}

function GA(){
	global $seo,$root;
	
	include $root.'/acp/config.seo.php';
	if ($seo['google_analytics'] != null) {
		echo "<script>";
  		echo "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){";
  		echo "(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),";
 		echo "m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)";
  		echo "})(window,document,'script','//www.google-analytics.com/analytics.js','ga');";

  		echo "ga('create', '$seo[google_analytics]', 'auto');";
  		echo "ga('send', 'pageview');";

		echo "</script>";
	}
}

function comment() {
	global $host,$comment,$data;
	
	echo "<div id=\"disqus_thread\"></div>";
	echo "<script type=\"text/javascript\">";
        echo "var disqus_shortname = '".$comment['disqus']."';";
		echo "var disqus_identifier = '".$data['id_post']."';";
    	echo "var disqus_title = '".stripcslashes($data['t_post'])."';";
    	echo "var disqus_url = '".$host."read/".$data['id_post']."/".$data['slug'].".html';";  
        echo "(function() {";
            echo "var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;";
            echo "dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';";
            echo "(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);";
        echo "})();";
    echo "</script>";      
}

function countcomment(){
	global $comment,$data;
	
	echo " | <i class=\"fa fa-comment\"></i> <a href=\"#disqus_thread\" data-disqus-identifier=\"".$data['id_post']."\"></a>";
	echo "<script type=\"text/javascript\">";
	echo "var disqus_shortname = '".$comment['disqus']."';";
        echo "(function () {";
        echo "var s = document.createElement('script'); s.async = true;";
        echo "s.type = 'text/javascript';";
        echo "s.src = '//' + disqus_shortname + '.disqus.com/count.js';";
        echo "(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);";
        echo "}());";
        echo "</script>";
}

function GetPortfolio() {
	global $portfolio,$datafolio,$queryfolio;
	
	$queryfolio = "SELECT * FROM media_img, cat_img WHERE media_img.cat_img = cat_img.id_cat_img AND cat_img.view = 'public' ORDER BY media_img.date_upload DESC";
	$portfolio = mysql_query($queryfolio);
}

function LoadPortfolio($item){
		
		global $host,$site,$portfolio,$results,$get_total_rows,$item_per_page,$total_pages;
			
			$item_per_page = $item;
			$results = "SELECT COUNT(media_img.id_img) FROM media_img, cat_img WHERE media_img.cat_img = cat_img.id_cat_img AND cat_img.view = 'public' ORDER BY media_img.date_upload DESC, media_img.id_img DESC";
			$portfolio = mysql_query($results);
			$get_total_rows = mysql_fetch_array($portfolio);
			$total_pages = ceil($get_total_rows[0]/$item_per_page);

		echo "<div id=\"results\"></div>";	
		echo "<noscript>";
        echo GetPortfolio();
			while($datafolio = mysql_fetch_array($portfolio)){
                echo "<div class=\"col-md-4 col-sm-6\">";
                echo "<a href=\"".$host.$datafolio['url_img']."\" title=\"".stripcslashes($datafolio['t_img'])."\" target=\"_blank\">";
                echo "<img class=\"img-responsive img-portfolio img-hover\" src=\"".$host.$datafolio['url_img']."\" alt=\"".stripcslashes($datafolio['alt_img'])."\"></a></div>";
            } echo "</noscript>";
}

function JSPortfolio(){
	global $host, $site, $total_pages;
	echo "<script type=\"text/javascript\">$(document).ready(function() {";

	echo "var track_click = 0;"; //track user click on "load more" button, righ now it is 0 click
	
	echo "var total_pages = $total_pages;";
	echo "$('#results').load(\"".$host.'/theme/'.$site['theme']."/portfolio.php\", {'page':track_click}, function() {track_click++;});"; //initial data to load

	echo "$(\".load_more\").click(function (e) {"; //user clicks on button
	
		echo "$(this).hide();"; //hide load more button on click
		echo "$('.animation_image').show();"; //show loading image

		echo "if(track_click <= total_pages){"; //make sure user clicks are still less than total pages
		
			//post page number and load returned data into result element
			echo "$.post('".$host.'/theme/'.$site['theme']."/portfolio.php',{'page': track_click}, function(data) {";
			
			echo "$(\".load_more\").show();"; //bring back load more button
				
			echo "$(\"#results\").append(data);"; //append data received from server
				
				//scroll page to button element
			echo "$(\"html, body\").animate({scrollTop: $(\"#load_more_button\").offset().top}, 500);";
				
				//hide loading image
			echo "$('.animation_image').hide();"; //hide loading image once data is received
	
			echo "track_click++;"; //user click increment on load button
			
			echo "}).fail(function(xhr, ajaxOptions, thrownError) {"; 
			echo "alert(thrownError);"; //alert any HTTP error
			echo "$(\".load_more\").show();"; //bring back load more button
			echo "$('.animation_image').hide();"; //hide loading image once data is received
			echo "});";
			
			
			echo "if(track_click >= total_pages){";
			
				//reached end of the page yet? disable load button
			echo "$(\".load_more\").attr(\"style\", \"visibility: hidden\");";
			echo "}";
			echo "}";

			echo "});";
	echo "});</script>";
}

function reCaptcha() {
	global $root;
	include $root.'/acp/apps/recaptcha/key.php';
	
	require_once('recaptchalib.php');
	$publickey = $recaptcha['public_key'];
	echo recaptcha_get_html($publickey);
}

// Function only show link category in breadcrums
function FindCategory() {
	global $category;	
	
		if (isset($_GET['id'])) {$find_cat = $_GET['id'];} else {$find_cat = "";}
		$querycat = "SELECT cat_post.name_cat_post FROM post, cat_post WHERE post.cat_post = cat_post.id_cat_post AND id_post='$find_cat' AND status_post='published'";
		$hasilcat = mysql_query($querycat) or IsQueryError();
		$datacat  = mysql_fetch_array($hasilcat);
		$category = stripcslashes($datacat['name_cat_post']);
}

function SideSearch() {
	global $site,$host,$root;
	
	include $root.'/acp/model/set.lang.php';
	
	echo "<div class=\"well\">";                    
	echo "<form action=\"".$host."\" method=\"get\">";
	echo "<div class=\"input-group\">";
	echo "<input type=\"text\" class=\"form-control hide\" name=\"p\" value=\"search\">";
	echo "<input type=\"text\" class=\"form-control\" name=\"s\" placeholder=\"".$lang['search']."\">";
    echo "<span class=\"input-group-btn\">";
	echo "<button class=\"btn btn-default\" type=\"submit\"><i class=\"fa fa-search\"></i></button>";
	echo "</span>";
    echo "</div></form>";
    echo "</div>";
}	

function NavSearch($position,$sizes) {
	global $site,$host,$root;
	
	include $root.'/acp/model/set.lang.php';
	
	echo "<form action=\"".$host."\" method=\"get\" class=\"navbar-form navbar-".$position."\" role=\"search\">";
	echo "<div class=\"input-group\">";
	echo "<input type=\"text\" class=\"form-control hide\" name=\"p\" value=\"search\">";
	echo "<input type=\"text\" class=\"form-control\" size=\"".$sizes."\" name=\"s\" placeholder=\"".$lang['search']."\">";
	echo "<span class=\"input-group-btn\">";
	echo "<button class=\"btn btn-default\" type=\"submit\"><i class=\"fa fa-search\"></i></button>";
    echo "</span>";
    echo "</div></form>";
}

function BreadRead() {
	global $data,$host,$category,$root;
	
	include $root.'/acp/model/set.lang.php';
	echo "<ol class=\"breadcrumb\">";
	echo "<li itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><i class=\"fa fa-home\"></i> <a href=\"".$host."\" itemprop=\"url\"><span itemprop=\"title\">Home</span></a></li>";
	echo "<li itemprop=\"child\" itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><a href=\"".$host."post.html\" itemprop=\"url\"><span itemprop=\"title\">".$lang['posts']."</span></a></li>";
	echo "<li itemprop=\"child\" itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><a href=\"".$host."cat/".$category.".html\" itemprop=\"url\"><span itemprop=\"title\">".$category."</span></a></li>";
	echo "<li class=\"active\">".$data['t_post']."</li>";
    echo "</ol>";
}

function BreadSearch() {
	global $host,$root;
	
	include $root.'/acp/model/set.lang.php';
	echo "<ol class=\"breadcrumb\">";
	echo "<li itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><i class=\"fa fa-home\"></i> <a href=\"".$host."\" itemprop=\"url\"><span itemprop=\"title\">Home</span></a></li>";
	echo "<li itemprop=\"child\" itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><a href=\"".$host."post.html\" itemprop=\"url\"><span itemprop=\"title\">".$lang['posts']."</span></a></li>";
	echo "<li class=\"active\">".$lang['search']."</li>";
    echo "</ol>";
}

function BreadCat() {
	global $host,$root;
	
	include $root.'/acp/model/set.lang.php';
	echo "<ol class=\"breadcrumb\">";
	echo "<li itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><i class=\"fa fa-home\"></i> <a href=\"".$host."\" itemprop=\"url\"><span itemprop=\"title\">Home</span></a></li>";
	echo "<li itemprop=\"child\" itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><a href=\"".$host."post.html\" itemprop=\"url\"><span itemprop=\"title\">".$lang['posts']."</span></a></li>";
	echo "<li class=\"active\">".$lang['category']."</li>";
    echo "</ol>";
}

function BreadTag() {
	global $host,$root;
	
	include $root.'/acp/model/set.lang.php';
	echo "<ol class=\"breadcrumb\">";
	echo "<li itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><i class=\"fa fa-home\"></i> <a href=\"".$host."\" itemprop=\"url\"><span itemprop=\"title\">Home</span></a></li>";
	echo "<li itemprop=\"child\" itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><a href=\"".$host."post.html\" itemprop=\"url\"><span itemprop=\"title\">".$lang['posts']."</span></a></li>";
	echo "<li class=\"active\">".$lang['hashtag']."</li>";
    echo "</ol>";
}

function FrontMeta(){
	global $root;
	include $root.'/acp/config.s.seo.php';
	echo "<title>".stripcslashes($sseo['front_meta_title'])."</title>";
	echo "<meta name=\"keywords\" content=\"".stripcslashes($sseo['front_meta_keywords'])."\">";
	echo "<meta name=\"description\" content=\"".stripcslashes($sseo['front_meta_description'])."\">";
}

function HashtagMeta(){
	global $root,$lang;
	
	include $root.'/acp/config.s.seo.php';
	include $root.'/acp/model/set.lang.php';
	if (!empty($_GET['page'])){
		echo "<title>".stripcslashes($sseo['hashtag_meta_title'])." | ".$_GET['s']." ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."</title>";
		echo "<meta name=\"keywords\" content=\"".stripcslashes($sseo['hashtag_meta_keywords']).", ".$_GET['s']." ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."\">";
		echo "<meta name=\"description\" content=\"".stripcslashes($sseo['hashtag_meta_description'])." | ".$_GET['s']." ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."\">";
	}
	else {echo "<title>".stripcslashes($sseo['hashtag_meta_title'])." | ".$_GET['s']."</title>";
		echo "<meta name=\"keywords\" content=\"".stripcslashes($sseo['hashtag_meta_keywords']).", ".$_GET['s']."\">";
		echo "<meta name=\"description\" content=\"".stripcslashes($sseo['hashtag_meta_description'])." | ".$_GET['s']."\">";
	}
}

function PostMeta(){
	global $root,$url;
	include $root.'/acp/config.s.seo.php';
	include $root.'/acp/model/set.lang.php';
	if ($url['page'] == "post.php" && empty($_GET['page'])) {echo FrontMeta();} else {
		if (!empty($_GET['page'])){
			echo "<title>".stripcslashes($sseo['post_meta_title'])." | ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."</title>";
			echo "<meta name=\"keywords\" content=\"".stripcslashes($sseo['post_meta_keywords']).", ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."\">";
			echo "<meta name=\"description\" content=\"".stripcslashes($sseo['post_meta_description'])." | ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."\">";
		}
		else {echo "<title>".stripcslashes($sseo['post_meta_title'])."</title>";
			echo "<meta name=\"keywords\" content=\"".stripcslashes($sseo['post_meta_keywords'])."\">";
			echo "<meta name=\"description\" content=\"".stripcslashes($sseo['post_meta_description'])."\">";
		}
	}
}

function ForumMeta(){
	global $root;
	include $root.'/acp/config.s.seo.php';
	echo "<title>".stripcslashes($sseo['forum_meta_title'])."</title>";
	echo "<meta name=\"keywords\" content=\"".stripcslashes($sseo['forum_meta_keywords'])."\">";
	echo "<meta name=\"description\" content=\"".stripcslashes($sseo['forum_meta_description'])."\">";
}

function CategoryMeta(){
	global $root;
	include $root.'/acp/config.s.seo.php';
	include $root.'/acp/model/set.lang.php';
	if (!empty($_GET['page'])){
		echo "<title>".stripcslashes($sseo['category_meta_title'])." | ".$_GET['s']." ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."</title>";
		echo "<meta name=\"keywords\" content=\"".stripcslashes($sseo['category_meta_keywords']).", ".$_GET['s']." ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."\">";
		echo "<meta name=\"description\" content=\"".stripcslashes($sseo['category_meta_description'])." | ".$_GET['s']." ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."\">";
	}
	else {
		echo "<title>".stripcslashes($sseo['category_meta_title'])." | ".$_GET['s']."</title>";
		echo "<meta name=\"keywords\" content=\"".stripcslashes($sseo['category_meta_keywords']).", ".$_GET['s']."\">";
		echo "<meta name=\"description\" content=\"".stripcslashes($sseo['category_meta_description'])." | ".$_GET['s']."\">";
	}
}

function SearchMeta(){
	global $root;
	include $root.'/acp/config.s.seo.php';
	include $root.'/acp/model/set.lang.php';
	if (!empty($_GET['page'])){
		echo "<title>".stripcslashes($sseo['search_meta_title'])." | ".$_GET['s']." ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."</title>";
		echo "<meta name=\"keywords\" content=\"".stripcslashes($sseo['search_meta_keywords']).", ".$_GET['s']." ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."\">";
		echo "<meta name=\"description\" content=\"".stripcslashes($sseo['search_meta_description'])." | ".$_GET['s']." ".$lang['page']." ".((empty($_GET['page']))? '1' : $_GET['page'])."\">";	
	}
	else {echo "<title>".stripcslashes($sseo['search_meta_title'])." | ".$_GET['s']."</title>";
		echo "<meta name=\"keywords\" content=\"".stripcslashes($sseo['search_meta_keywords']).", ".$_GET['s']."\">";
		echo "<meta name=\"description\" content=\"".stripcslashes($sseo['search_meta_description'])." | ".$_GET['s']."\">";
	}
}

function AutoHashtag($datatext){
	global $host,$root;
	$regex = "/(#)+[a-zA-Z0-9]+/";
	$datatext = preg_replace($regex, "<a href=\"".$host."tag/$0.html\">$0</a>", $datatext);
	$remove = array("#");
	$datatext = str_replace($remove, "", $datatext);
	return($datatext);
}

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)){$ip = $client;}
    	elseif(filter_var($forward, FILTER_VALIDATE_IP)){$ip = $forward;}
    else {$ip = $remote;}
    return $ip;
}

function xroot($javroot){
	global $host,$site,$root;
	include $root.'/'.$javroot;
}

function xhost($javhost){
	global $host,$site,$root;
	include $host.'/'.$javhost;
}

function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = ($suffix)?"{$date} {$suffix}":"{$date}";
    return $date;
} 


/* Register class / function / variable from Apps or Theme*/
include $root.'/acp/apps/opengraph/function.og.php'; // Opengraph
include $root.'/theme/'.$site['theme'].'/info.php'; // Variable Theme
	