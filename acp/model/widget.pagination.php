<?php

// How to use:
//-------------------------------------
// tabel yang akan diambil datanya
//$table = 'user';
 
// ambil data
//$dataTable = getTableData($table, $page, $dataPerPage);
 
// menampilkan tombol paginasi
//showPagination($table, $dataPerPage);

//-------------------------------------

function showPagination($table, $limit = 10)
{
	$table = 'widget';
	$limit = 10;
    $countTotalRow = mysql_query('SELECT COUNT(*) AS total FROM '.$table.' ORDER BY position ASC');
    $queryResult = mysql_fetch_assoc($countTotalRow);
    $totalRow = $queryResult['total'];
    $totalPage = ceil($totalRow / $limit);
 
    $page = 1;
    while ($page <= $totalPage)
    {
        echo '<a href="?page='.$page.'&perPage='.$limit.'">'.$page.'</a>';
        if ($page < $totalPage)
            echo "";
 
        $page++;
    }
}
?>

<?php
function getTableData($table, $page = 1, $limit = 10)
{
    $dataTable = array();
    $startRow = ($page - 1) * $limit;
    $query = mysql_query('SELECT * FROM '.$table.' ORDER BY position ASC LIMIT '.$startRow.', '.$limit);
 
    while ($data = mysql_fetch_assoc($query))
        array_push($dataTable, $data);
 
    return $dataTable;
}
?>

<?php function tablewidget(){
	global $table,$totalrow,$dataPerPage,$page,$dataTable;
	$query = "SELECT * FROM widget ORDER BY position ASC";
	$hasil = mysql_query($query);
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
$table = 'widget';
 
// ambil data
$dataTable = getTableData($table, $page, $dataPerPage);
	}
	?>

<?php
// Widget with pagination relasi
function ViewWidget(){
	global $totalrow,$result,$noPage,$jumData;

// jumlah data yang akan ditampilkan per halaman
	$dataPerPage = 10;

	// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
	// sedangkan apabila belum, nomor halamannya 1.

	if(isset($_GET['page']))
	{$noPage = $_GET['page'];} 
	else $noPage = 1;

	// perhitungan offset
	$offset = ($noPage - 1) * $dataPerPage;

	// query SQL untuk menampilkan data perhalaman sesuai offset
	$query = "SELECT * FROM widget ORDER BY position ASC LIMIT $offset, $dataPerPage";
	$result = mysql_query($query);
	if (!$result) IsQueryError(); 

	// mencari jumlah semua data dalam tabel 
	$query2   = "SELECT COUNT(*) AS jumData FROM widget ORDER BY position ASC";
	$hasil2  = mysql_query($query2);
	if (!$hasil2) IsQueryError();
	$data2     = mysql_fetch_array($hasil2);

	$jumData = $data2['jumData'];

	// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
	$jumPage = ceil($jumData/$dataPerPage);
	$nomor = mysql_num_rows($hasil2);
}