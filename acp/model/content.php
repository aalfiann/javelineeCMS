<?php

// Data Post
function data_post() {
	global $noPage,$result,$jumData,$jumPage;

	// jumlah data yang akan ditampilkan per halaman
	$dataPerPage = 10;

	// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
	// sedangkan apabila belum, nomor halamannya 1.

	if(isset($_GET['page'])){$noPage = $_GET['page'];} 
		else $noPage = 1;

	// perhitungan offset
	$offset = ($noPage - 1) * $dataPerPage;

	// query SQL untuk menampilkan data perhalaman sesuai offset
	$query = "SELECT * FROM post, cat_post WHERE post.cat_post = cat_post.id_cat_post ORDER BY date_post DESC, id_post DESC LIMIT $offset, $dataPerPage";
	$result = mysql_query($query);
		if (!$result) IsQueryError(); 

	// mencari jumlah semua data dalam tabel guestbook
	$query2   = "SELECT COUNT(*) AS jumData FROM post, cat_post WHERE post.cat_post = cat_post.id_cat_post ORDER BY date_post DESC, id_post DESC";
	$hasil2  = mysql_query($query2);
		if (!$hasil2) IsQueryError();
	$data2     = mysql_fetch_array($hasil2);

	$jumData = $data2['jumData'];
	// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

	$jumPage = ceil($jumData/$dataPerPage);
	$nomor = mysql_num_rows($hasil2);
}
// Edit Post
function EditPost() {
	global $data;
	if (isset($_GET['id'])) {$id_post  = $_GET['id'];} else {$id_post  = "";}

	$query = "SELECT * FROM post WHERE id_post='".mysql_real_escape_string($id_post)."'";
	$hasil = mysql_query($query);
	if (!$hasil) IsQueryError();
	$data  = mysql_fetch_array($hasil);
}

// Data Page
function data_page() {
	global $totalrow,$dataPerPage,$page,$table,$dataTable;
	$query = "SELECT * FROM page";
	$hasil = mysql_query($query);
		if (!$hasil) IsQueryError();

	$totalrow = mysql_num_rows($hasil);

	$page = 1;
		if (isset($_GET['page']) && !empty($_GET['page']))
    		$page = (int)safe($_GET['page']);
 	
	// untuk mengetahui berapa banyak data yang akan ditampilkan
	// juga untuk men-set nilai default menjadi 10 jika tidak ada
	// data $_GET['perPage'] yang dikirimkan
	$dataPerPage = 10;
		if (isset($_GET['page']) && !empty($_GET['page']))
    		$dataPerPage = (int)safe($_GET['page']);
 
	// tabel yang akan diambil datanya
	$table = 'page';
 
	// ambil data
	$dataTable = getTableData($table, $page, $dataPerPage);
}

// Edit Page
function EditPage() {
	global $data;
	if (isset($_GET['id'])) {$id_page  = $_GET['id'];} else {$id_page  = "";}

	$query = "SELECT * FROM page WHERE id_page='".mysql_real_escape_string($id_page)."'";
	$hasil = mysql_query($query);
	if (!$hasil) IsQueryError();
	
	$data  = mysql_fetch_array($hasil);
}

function category_post() {
	global $table,$totalrow,$dataPerPage,$page,$dataTable;
	
	$query = "SELECT * FROM cat_post";
	$hasil = mysql_query($query);
		if (!$hasil) IsQueryError();

	$totalrow = mysql_num_rows($hasil);

	$page = 1;
		if (isset($_GET['page']) && !empty($_GET['page']))
    		$page = (int)safe($_GET['page']);
 
	// untuk mengetahui berapa banyak data yang akan ditampilkan
	// juga untuk men-set nilai default menjadi 10 jika tidak ada
	// data $_GET['perPage'] yang dikirimkan
	$dataPerPage = 10;
		if (isset($_GET['page']) && !empty($_GET['page']))
    		$dataPerPage = (int)safe($_GET['page']);   
 
	// tabel yang akan diambil datanya
	$table = 'cat_post';
 
	// ambil data
	$dataTable = getTableData($table, $page, $dataPerPage);
}

function search_post() {
	global $search_post,$noPage,$result,$jumData,$jumPage;
	
	if (isset($_GET['q'])) {$search_post = safe($_GET['q']);} else {$search_post = "";}

	// jumlah data yang akan ditampilkan per halaman
	$dataPerPage = 10;

	// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
	// sedangkan apabila belum, nomor halamannya 1.

	if(isset($_GET['page'])){$noPage = safe($_GET['page']);} 
		else $noPage = 1;

	// perhitungan offset
	$offset = ($noPage - 1) * $dataPerPage;

	// query SQL untuk menampilkan data perhalaman sesuai offset
	$query = "SELECT * FROM post, cat_post WHERE post.cat_post = cat_post.id_cat_post AND t_post like '%".$search_post."%' ORDER BY date_post DESC, id_post DESC LIMIT $offset, $dataPerPage";
	$result = mysql_query($query);
	if (!$result) IsQueryError();
	
	// mencari jumlah semua data dalam tabel guestbook
	$query2   = "SELECT COUNT(*) AS jumData FROM post, cat_post WHERE post.cat_post = cat_post.id_cat_post AND t_post like '%".$search_post."%' ORDER BY date_post DESC";
	$hasil2  = mysql_query($query2);
	$data2     = mysql_fetch_array($hasil2);

	$jumData = $data2['jumData'];
	// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

	$jumPage = ceil($jumData/$dataPerPage);
	$nomor = mysql_num_rows($hasil2);
}	