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
    $countTotalRow = mysql_query('SELECT COUNT(*) AS total FROM `'.$table.'`');
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
    $query = mysql_query('SELECT * FROM `'.$table.'` LIMIT '.$startRow.', '.$limit);
 
    while ($data = mysql_fetch_assoc($query))
        array_push($dataTable, $data);
 
    return $dataTable;
}
?>