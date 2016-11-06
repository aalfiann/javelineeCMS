<?php

//Avatar
function EditAvatar() {
	global $data,$user;
	$username  = $_GET['username'];
	$query = "SELECT * FROM user WHERE username='".mysql_real_escape_string($username)."'";
	$hasil = mysql_query($query);
	if (!$hasil) echo IsQueryError();
	
	$data  = mysql_fetch_array($hasil);
}

//Edit User
function EditUser() {
	include 'safe.php';
	include 'database.php';
	global $data;
	
	if (isset($_GET['username'])) {$username  = $_GET['username'];} else {$username = "";}
	
	$query = "SELECT * FROM user WHERE username='".mysql_real_escape_string($username)."'";
	$hasil = mysql_query($query);
	if (!$hasil) echo IsQueryError();
	
	$data  = mysql_fetch_array($hasil);
}

//Delete User
if (isset($_GET['delete'])) {
	include 'database.php';
	include '../config.php';
	$username  = $_GET['delete'];

	$query = "DELETE FROM user WHERE username='".mysql_real_escape_string($username)."'";
	$hasil = mysql_query($query); 
	if(!$hasil) echo IsQueryError();

	$iquery = "DELETE FROM user_info WHERE username='".mysql_real_escape_string($username)."'";
	$ihasil = mysql_query($iquery); 
	if(!$ihasil) echo IsQueryError();

	header('Location: '.$host.'/acp/data.user.php');
}

function ShowUser(){ 
	include 'database.php'; 
	include 'pagination.php';
	global $table,$totalrow,$dataPerPage,$dataTable,$page;

	$query = "SELECT * FROM user";
	$hasil = mysql_query($query);
		if (!$hasil) IsQueryError();

	$totalrow = mysql_num_rows($hasil);

	$page = 1;
		if (isset($_GET['page']) && !empty($_GET['page']))
   		$page = (int)$_GET['page'];
 
	// untuk mengetahui berapa banyak data yang akan ditampilkan
	// juga untuk men-set nilai default menjadi 10 jika tidak ada
	// data $_GET['perPage'] yang dikirimkan
	$dataPerPage = 10;
		if (isset($_GET['perPage']) && !empty($_GET['perPage']))
   		$dataPerPage = (int)$_GET['perPage'];

	// tabel yang akan diambil datanya
	$table = 'user';
 
	// ambil data
	$dataTable = getTableData($table, $page, $dataPerPage);	
}

