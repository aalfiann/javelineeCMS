<?php

function data_img() {
	global $noPage,$result,$jumData,$jumPage;
	// jumlah data yang akan ditampilkan per halaman
	$dataPerPage = 12;

	// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
	// sedangkan apabila belum, nomor halamannya 1.

	if(isset($_GET['page'])){$noPage = $_GET['page'];} 
		else $noPage = 1;

	// perhitungan offset
	$offset = ($noPage - 1) * $dataPerPage;

	// query SQL untuk menampilkan data perhalaman sesuai offset
	$query = "SELECT * FROM media_img, cat_img WHERE media_img.cat_img = cat_img.id_cat_img ORDER BY date_upload DESC, id_img DESC LIMIT $offset, $dataPerPage";
	$result = mysql_query($query);
		if (!$result) IsQueryError();  

	// mencari jumlah semua data dalam tabel 
	$query2   = "SELECT COUNT(*) AS jumData FROM media_img, cat_img WHERE media_img.cat_img = cat_img.id_cat_img ORDER BY date_upload DESC, id_img DESC";
	$hasil2  = mysql_query($query2);
	$data2     = mysql_fetch_array($hasil2);

	$jumData = $data2['jumData'];
	// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
	$jumPage = ceil($jumData/$dataPerPage);
	$nomor = mysql_num_rows($hasil2);
}

function data_file() {
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
	$query = "SELECT * FROM media_file, cat_file WHERE media_file.cat_file = cat_file.id_cat ORDER BY date_upload DESC, id_file DESC LIMIT $offset, $dataPerPage";

	$result = mysql_query($query);
		if (!$result) IsQueryError(); 

	// mencari jumlah semua data dalam tabel guestbook
	$query2   = "SELECT COUNT(*) AS jumData FROM media_file, cat_file WHERE media_file.cat_file = cat_file.id_cat ORDER BY date_upload DESC, id_file DESC";
	$hasil2  = mysql_query($query2);
		if (!$hasil2) IsQueryError();
	$data2     = mysql_fetch_array($hasil2);

	$jumData = $data2['jumData'];
	// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
	$jumPage = ceil($jumData/$dataPerPage);
	$nomor = mysql_num_rows($hasil2);
}

function category_file() {
	global $table,$dataPerPage,$totalrow,$dataTable,$page;
	$query = "SELECT * FROM cat_file order by name_file ASC";
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
	$table = 'cat_file';
 
	// ambil data
	$dataTable = getTableData($table, $page, $dataPerPage);
}

function category_img() {
	global $table,$dataPerPage,$totalrow,$dataTable,$page;
	$query = "SELECT * FROM cat_img order by name_img ASC";
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
	$table = 'cat_img';
 
	// ambil data
	$dataTable = getTableData($table, $page, $dataPerPage);		
}

function search_file() {
	global $search_file,$noPage,$result,$jumData,$jumPage;
	
	if (isset($_GET['q'])) {$search_file = safe($_GET['q']);} else {$search_file = "";}

	// jumlah data yang akan ditampilkan per halaman
	$dataPerPage = 10;

	// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
	// sedangkan apabila belum, nomor halamannya 1.

	if(isset($_GET['page'])){$noPage = safe($_GET['page']);} 
		else $noPage = 1;

	// perhitungan offset
	$offset = ($noPage - 1) * $dataPerPage;

	// query SQL untuk menampilkan data perhalaman sesuai offset
	$query = "SELECT * FROM media_file, cat_file WHERE media_file.cat_file = cat_file.id_cat AND t_file like '%".$search_file."%' ORDER BY date_upload DESC, id_file DESC LIMIT $offset, $dataPerPage";
	$result = mysql_query($query);
	if (!$result) IsQueryError();
	
	// mencari jumlah semua data dalam tabel guestbook
	$query2   = "SELECT COUNT(*) AS jumData FROM media_file, cat_file WHERE media_file.cat_file = cat_file.id_cat AND t_file like '%".$search_file."%' ORDER BY date_upload DESC, id_file DESC";
	$hasil2  = mysql_query($query2);
	$data2     = mysql_fetch_array($hasil2);

	$jumData = $data2['jumData'];
	// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

	$jumPage = ceil($jumData/$dataPerPage);
	$nomor = mysql_num_rows($hasil2);
}		

function search_img() {
	global $search_img,$noPage,$result,$jumData,$jumPage;
	
	if (isset($_GET['q'])) {$search_img = safe($_GET['q']);} else {$search_img = "";}

	// jumlah data yang akan ditampilkan per halaman
	$dataPerPage = 10;

	// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
	// sedangkan apabila belum, nomor halamannya 1.

	if(isset($_GET['page'])){$noPage = safe($_GET['page']);} 
		else $noPage = 1;

	// perhitungan offset
	$offset = ($noPage - 1) * $dataPerPage;

	// query SQL untuk menampilkan data perhalaman sesuai offset
	$query = "SELECT * FROM media_img, cat_img WHERE media_img.cat_img = cat_img.id_cat_img AND t_img like '%".$search_img."%' ORDER BY date_upload DESC, id_img DESC LIMIT $offset, $dataPerPage";
	$result = mysql_query($query); 
	if (!$result) IsQueryError();
	// mencari jumlah semua data dalam tabel guestbook
	$query2   = "SELECT COUNT(*) AS jumData FROM media_img, cat_img WHERE media_img.cat_img = cat_img.id_cat_img AND t_img like '%".$search_img."%' ORDER BY date_upload DESC, id_img DESC";
	$hasil2  = mysql_query($query2);
	$data2     = mysql_fetch_array($hasil2);

	$jumData = $data2['jumData'];
	
	// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
	$jumPage = ceil($jumData/$dataPerPage);
	$nomor = mysql_num_rows($hasil2);
}