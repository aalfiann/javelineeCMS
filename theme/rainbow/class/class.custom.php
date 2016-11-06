<?php

/**
 * Class Custom makes more easy to customize Your theme for Javelinee CMS theme.
 * 
 * @version: 1.0
 * @author: M ABD AZIZ ALFIAN <aalfiann@gmail.com>
 * @copyright 2014 Javelinee
 * @license: Creative Common License
 * 
 */

    class Custom
        {
			// List new post	
            public static function NewPost()
            {
				global $seo;
                if ($seo['type_url'] == "clean") 
                {
                    self::DataNewPostClean();
                }
                else 
                {
                    self::DataNewPostStandar();
                }
            }

			// Category Result	
            public static function CatResult()
            {
				global $seo;
                if ($seo['type_url'] == "clean") 
                {
                    self::DataCatResultClean();
                }
                else 
                {
                    self::DataCatResultStandar();
                }
            }

			// Hastag Result	
            public static function TagResult()
            {
				global $seo;
                if ($seo['type_url'] == "clean") 
                {
                    self::DataTagResultClean();
                }
                else 
                {
                    self::DataTagResultStandar();
                }
            }

			// Search Result	
            public static function TitleResult()
            {
				global $seo;
                if ($seo['type_url'] == "clean") 
                {
                    self::DataTitleResultClean();
                }
                else 
                {
                    self::DataTitleResultStandar();
                }
            }

			// Read Post	
            public static function ReadPost()
            {
				global $seo;
                if ($seo['type_url'] == "clean") 
                {
                    self::DataReadPostClean();
                }
                else 
                {
                    self::DataReadPostStandar();
                }
            }

			// List Popular	
            public static function ListPopuler()
            {
				global $seo;
                if ($seo['type_url'] == "clean") 
                {
                    self::DataListPopulerClean();
                }
                else 
                {
                    self::DataListPopulerStandar();
                }
            }

			// List Category	
            public static function ListCategory()
            {
				global $seo;
                if ($seo['type_url'] == "clean") 
                {
                    self::DataListCategoryClean();
                }
                else 
                {
                    self::DataListCategoryStandar();
                }
            }

			// Advertise
			public static function ShowAdvertise($tipeads)
            {
				self::DataAdvertise($tipeads);
            }

			//PRIVATE FUNCTION=======================================

			//Load Advertise
			private static function DataAdvertise($tipeads) 
			{
				global $site,$host;

				$jenisads = safe($tipeads);

				$query = "SELECT a.id_ads,a.code_ads,a.view_ads
					FROM advertise a
					INNER JOIN advertise_type b ON a.type_ads = b.type_ads
					WHERE a.expired_at > DATE(now())
					AND a.status_ads = 'enabled'
					AND b.detail = '$jenisads'
					ORDER BY rand() LIMIT 1";
				$hasil = mysql_query($query);
				$data  = mysql_fetch_array($hasil);
				
				echo	stripcslashes($data['code_ads']);
		
				//Count Visitor
				if($_GET['p']=="post" || $_GET['p']=="read" || $_GET['p']=="tag" || $_GET['p']=="cat" || $_GET['p']=="search")
				{
					$queryvisitor = "UPDATE advertise SET view_ads='".($data['view_ads'] + 1)."' where advertise.id_ads='".$data['id_ads']."';";
					$hasilvisitor = mysql_query($queryvisitor);
				}
			}

			// List new post Clean
            private static function DataNewPostClean() 
            {
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

    	    	if ($nomor > 0) 
                {
		        	while($data = mysql_fetch_array($result)) 
                    {
    			    	$more = explode("<!--more-->", $data['c_post']);
    	    			echo "<a href=\"".$host."read/$data[id_post]/$data[slug].html\"><h1>$data[t_post]</h1></a>";
	    	    		echo stripcslashes($more[0]); if (!empty($more[1])) {echo "<a href=\"".$host."read/$data[id_post]/$data[slug].html\"><h5>$lang[read_more]</h5></a>";}
		    	    	echo "<div class=\"pull-right\"><i class=\"fa fa-folder\"></i> <a href=\"".$host."cat/$data[name_cat_post].html\">$data[name_cat_post]</a></div>";
			    	    $names = $data['hash_post'];	
    			    	$named = preg_split( "/[;, @#]/", $names );
					
    					foreach($named as $name)
                        {
		    				if ($name != null){echo "<a href=\"".$host."tag/$name.html\">#$name</a> ";}
			    		}
				    	echo "<br><hr>";
                    }
	
	            	echo "<br>";
            		echo "<ul class=\"pager\">";
		            $min = $noPage-1;
        		    $plus = $noPage+1;
            		if ($noPage > 1) echo "<li class=\"previous\"><a href=\"$_SERVER[PHP_SELF]?p=post&page=$min \">&larr; $lang[newest]</a></li>";
            		if (!empty($_GET['page'])) 
                    {
                        if ($jumPage > $_GET['page']) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=post&page=$plus \">$lang[older] &rarr;</a></li>";
                    }
            		else 
                    {
                        if ($nomor >= $dataPerPage) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=post&page=$plus \">$lang[older] &rarr;</a></li>";
                    }	
            		echo "</ul>";
                 }
                 else {echo "<h5>".$lang['no_post']."</h5>";}
            }

			// List new post Standar
            private static function DataNewPostStandar() 
            {
        	    global $root,$site,$host,$data,$noPage,$lang,$lang_file;
	
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
	
            	if ($nomor > 0)
                {
        		    while($data = mysql_fetch_array($result)) 
                    {
            			$more = explode("<!--more-->", $data['c_post']);
            			echo "<a href=\"$_SERVER[PHP_SELF]?p=read&id=$data[id_post]&s=$data[slug]\"><h1>$data[t_post]</h1></a>";
            			echo stripcslashes($more[0]); if (!empty($more[1])) {echo "<a href=\"$_SERVER[PHP_SELF]?p=read&id=$data[id_post]&s=$data[slug]\"><h5>$lang[read_more]</h5></a>";}
            			echo "<div class=\"pull-right\"><i class=\"fa fa-folder\"></i> <a href=\"$_SERVER[PHP_SELF]?p=cat&s=$data[name_cat_post]\">$data[name_cat_post]</a></div>";
            			$names = $data['hash_post'];	
            			$named = preg_split( "/[;, @#]/", $names );
        
        				foreach($named as $name)
                        {
		    			    if ($name != null){echo "<a href=\"$_SERVER[PHP_SELF]?p=tag&hash=$name\">#$name</a> ";}
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
            	} 
                else 
                {
                    echo "<h5>".$lang['no_post']."</h5>";
                }
            }

			// Search Result Categories with Pagination Clean
			private static function DataCatResultClean() 
			{
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
 
 			// Search Result Categories with Pagination Standar
			private static function DataCatResultStandar() 
			{
				global $root,$site,$host,$data,$noPage;
	
				include $root.'/acp/model/set.lang.php';
	
				if(empty($_GET['s'])) {header("Location: ".$host."?p=error");}	
	
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
	
				if ($nomor > 0) 
				{
					while($data = mysql_fetch_array($result)) { 
						echo "<a href=\"$_SERVER[PHP_SELF]?p=read&id=$data[id_post]&s=$data[slug]\"><h1>$data[t_post]</h1></a>";
						$more = explode("<!--more-->", $data['c_post']); echo stripcslashes($more[0]); if (!empty($more[1])) {echo "<a href=\"$_SERVER[PHP_SELF]?p=read&id=$data[id_post]&s=$data[slug]\"><h5>$lang[read_more]</h5></a>";}
						echo "<div class=\"pull-right\"><i class=\"fa fa-folder\"></i> <a href=\"$_SERVER[PHP_SELF]?p=cat&s=$data[name_cat_post]\">$data[name_cat_post]</a></div>";
						$names = $data['hash_post'];	
						$named = preg_split( "/[;, @#]/", $names );
			
						foreach($named as $name){
							if ($name != null){echo "<a href=\"$_SERVER[PHP_SELF]?p=tag&hash=$name\">#$name</a> ";}
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
 
 			// Search Result Hashtag with Pagination Clean
			private static function DataTagResultClean() 
			{
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

			// Search Result Hashtag with Pagination Standar
			private static function DataTagResultStandar() 
			{
				global $root,$site,$host,$data,$noPage;
	
				include $root.'/acp/model/set.lang.php';
	
				if(empty($_GET['hash'])) {header("Location: ".$host."?p=error");}	
	
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
				if(isset($_GET['hash']))
				{$hash_post = safe($_GET['hash']);}
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
						echo "<a href=\"$_SERVER[PHP_SELF]?p=read&id=$data[id_post]&s=$data[slug]\"><h1>$data[t_post]</h1></a>";
						$more = explode("<!--more-->", $data['c_post']); echo stripcslashes($more[0]); if (!empty($more[1])) {echo "<a href=\"$_SERVER[PHP_SELF]?p=read&id=$data[id_post]&s=$data[slug]\"><h5>$lang[read_more]</h5></a>";}
						echo "<div class=\"pull-right\"><i class=\"fa fa-folder\"></i> <a href=\"$_SERVER[PHP_SELF]?p=cat&s=$data[name_cat_post]\">$data[name_cat_post]</a></div>";
						$names = $data['hash_post'];	
						$named = preg_split( "/[;, @#]/", $names );
			
						foreach($named as $name){
							if ($name != null){echo "<a href=\"$_SERVER[PHP_SELF]?p=tag&hash=$name\">#$name</a> ";}
						}echo "<br><hr>";}
	
						echo "<br>";
						echo "<ul class=\"pager\">";
						$min = $noPage-1;
						$plus = $noPage+1;
						if ($noPage > 1) echo "<li class=\"previous\"><a href=\"$_SERVER[PHP_SELF]?p=tag&hash=$hash_post&page=$min \">&larr; $lang[newest]</a></li>";
						if (!empty($_GET['page'])) {if ($jumPage > $_GET['page']) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=tag&hash=$hash_post&page=$plus \">$lang[older] &rarr;</a></li>";}
						else {if ($nomor >= $dataPerPage) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=tag&hash=$hash_post&page=$plus \">$lang[older] &rarr;</a></li>";} 
						echo "</ul>";
				} else {echo "<h5>".$lang['no_post']."</h5>";}
			}

			// Search Result Title with Pagination Clean
			private static function DataTitleResultClean() 
			{
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

			// Search Result Title with Pagination Standar
			private static function DataTitleResultStandar() 
			{
				global $site,$host,$data,$noPage,$root;
	
				include $root.'/acp/model/set.lang.php';
	
				if(empty($_GET['s'])) {header("Location: ".$_SERVER['PHP_SELF']."?p=error");}	
	
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
						echo "<a href=\"$_SERVER[PHP_SELF]?p=read&id=$data[id_post]&s=$data[slug]\"><h1>$data[t_post]</h1></a>";
						$more = explode("<!--more-->", $data['c_post']); echo stripcslashes($more[0]); if (!empty($more[1])) {echo "<a href=\"$_SERVER[PHP_SELF]?p=read&id=$data[id_post]&s=$data[slug]\"><h5>$lang[read_more]</h5></a>";}
						echo "<div class=\"pull-right\"><i class=\"fa fa-folder\"></i> <a href=\"$_SERVER[PHP_SELF]?p=cat&s=$data[name_cat_post]\">$data[name_cat_post]</a></div>";
						$names = $data['hash_post'];	
						$named = preg_split( "/[;, @#]/", $names );
							
							foreach($named as $name){
								if ($name != null){echo "<a href=\"$_SERVER[PHP_SELF]?p=tag&hash=$name\">#$name</a> ";}
							}
							echo "<br><hr>";}

						echo "<br>";
						echo "<ul class=\"pager\">";
						$min = $noPage-1;
						$plus = $noPage+1;
						if ($noPage > 1) echo "<li class=\"previous\"><a href=\"$_SERVER[PHP_SELF]?p=search&s=$search_post&page=$min \">&larr; $lang[newest]</a></li>";
						if (!empty($_GET['page'])) {if ($jumPage > $_GET['page']) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=search&s=$search_post&page=$plus \">$lang[older] &rarr;</a></li>";}
						else {if ($nomor >= $dataPerPage) echo "<li class=\"next\"><a href=\"".$_SERVER['PHP_SELF']."?p=search&s=$search_post&page=$plus \">$lang[older] &rarr;</a></li>";}
						echo "</ul>";}
				else {echo "<h5>".$lang['search_not_found']."</h5>";}

			}

			// Reading Full Post No Pagination Clean
			private static function DataReadPostClean() 
			{
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
						echo "<br>";
					}											
				} echo "<br>";
		
				//Count Visitor
				$queryvisitor = "UPDATE post SET post.view='".($data[view] + 1)."', post.update_view=current_timestamp where post.id_post='".$id_post."';";
				$hasilvisitor = mysql_query($queryvisitor);
			}

			// Reading Full Post No Pagination Standar
			private static function DataReadPostStandar() 
			{
				global $site,$host,$comment,$data;
		
				$id_post = safe($_GET['id']);
				$query = "SELECT * FROM post, cat_post, user_info WHERE post.cat_post = cat_post.id_cat_post AND id_post='$id_post' AND post.username = user_info.username AND status_post='published'";
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
		
				echo "<a href=\"".$host."?p=read&id=".$data['id_post']."&s=".$data['slug']."\"><h1>".stripcslashes($data['t_post'])."</h1></a>";
				echo "<h6><i class=\"fa fa-calendar\"></i> ".$formatdate." <i class=\"fa fa-user\"></i> "; if ($data['google'] != null) {echo "<a href=\"".$data['google']."\" rel=\"me\" target=\"_blank\">".$data['username']."</a>";} else {echo $data['username'];}; if ($comment['disqus'] != null) {echo countcomment();} echo "</h6>";
				echo "<br>";
				echo	stripcslashes($data['c_post']);
				echo "<br>";
				echo "<div class=\"pull-right\"><i class=\"fa fa-folder\"></i> <a href=\"$_SERVER[PHP_SELF]?p=cat&s=$data[name_cat_post]\">$data[name_cat_post]</a></div>";		
		
				$names = $data['hash_post'];			
				$named = preg_split( "/[;, @#]/", $names );
		
				foreach($named as $name){
				
					if ($name != null){
						echo "<a href=\"$_SERVER[PHP_SELF]?p=tag&hash=$name\">#$name</a> ";
					}									
				} echo "<br>";

				//Count Visitor
				$queryvisitor = "UPDATE post SET post.view='".($data[view] + 1)."', post.update_view=current_timestamp where post.id_post='".$id_post."';";
				$hasilvisitor = mysql_query($queryvisitor);
			}

			// List populer on the week Clean
			private static function DataListPopulerClean()
			{
				global $host,$root,$lang;
				include $root.'/acp/model/set.lang.php';
				$QueryPopuler = "SELECT a.id_post,a.slug,a.t_post 
					FROM post a
					WHERE a.update_view between DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
					AND a.status_post = 'published'
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

			// List populer on the week standar
			private static function DataListPopulerStandar()
			{
				global $host,$root,$lang;
				include $root.'/acp/model/set.lang.php';
				$QueryPopuler = "SELECT a.id_post,a.slug,a.t_post 
					FROM post a
					WHERE a.update_view between DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
					AND a.status_post = 'published'
					ORDER BY a.`view` DESC
					LIMIT 7;";
				$listpopuler = mysql_query($QueryPopuler);			
				if (!$listpopuler) { die('Invalid query: ' . mysql_error());}			
				if (mysql_num_rows($listpopuler) > 0) {
					echo "<h5>".$lang['populer']."</h5>";
					echo "<ul class=\"list-group\">";
					while($data = mysql_fetch_array($listpopuler)) {
    						echo "<li class=\"list-group-item\">";
							echo "<span class=\"glyphicon glyphicon-share-alt\"></span> <a href=\"$_SERVER[PHP_SELF]?p=read&id=$data[id_post]&s=$data[slug]\">$data[t_post]</a>";
    						echo "</li>";
  					}
				echo "</ul>";
				}
			}

			// List Categories Clean
			private static function DataListCategoryClean()
			{
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

			// List Category standar
			private static function DataListCategoryStandar()
			{
				global $root,$lang;
				include $root.'/acp/model/set.lang.php';
				$QueryCatCategory = "SELECT name_cat_post FROM cat_post ORDER BY name_cat_post ASC";
				$listcatquery = mysql_query($QueryCatCategory);			
				if (!$listcatquery) { die('Invalid query: ' . mysql_error());}			
				if (mysql_num_rows($listcatquery) > 0) {
					echo "<h5>".$lang['category']."</h5>";
					echo "<ul class=\"list-group\">";
					while($data = mysql_fetch_array($listcatquery)) {
  					$QueryArtikelCategory = "SELECT name_cat_post FROM post, cat_post WHERE name_cat_post='".stripcslashes($data['name_cat_post'])."' AND post.cat_post = cat_post.id_cat_post AND status_post='published'";
    				$resultartikel = mysql_query($QueryArtikelCategory);
    				if (!$resultartikel) { die('Invalid query: ' . mysql_error());}
    					if (mysql_num_rows($resultartikel) > 0) {
    						echo "<li class=\"list-group-item\">";
    						echo "<span class=\"badge\">".mysql_num_rows($resultartikel)."</span>";
    						echo "<a href=\"".$_SERVER['PHP_SELF']."?p=cat&s=".stripcslashes($data['name_cat_post'])."\">".stripcslashes($data['name_cat_post'])."</a>";
  							echo "</li>";
  						}
  					}
				echo "</ul>";
				}
			}

			private static function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') 
			{
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

    }

?>