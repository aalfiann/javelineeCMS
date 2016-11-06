<?php
ob_start();
include '../config.php';
include $root.'/acp/model/check.php';
include $root.'/acp/model/database.php';
include $root.'/acp/model/pagination.php';
include $root.'/acp/model/safe.php'; 
include $root.'/acp/model/format.php';
include $root.'/acp/model/set.lang.php';

//====== ADVERTISE ==================

// Create new advertise
if (isset($_POST['create_ads'])) {
$nameads = safe($_POST['nameads']);
$ownerads = safe($_POST['ownerads']);
$emailads = safe($_POST['emailads']);
$phoneads = safe($_POST['phoneads']);
$webads = safe($_POST['webads']);
$priceads = safe($_POST['priceads']);
$typeads = safe($_POST['typeads']);
$expiredads = date('Y-m-d',strtotime(safe($_POST['expiredads']))).' '.date('h:i:s');
$codeads = safe($_POST['codeads']);		

	    $query = "INSERT INTO advertise (name_ads,type_ads,name,email,phone,website,harga_ads,status_ads,username,code_ads,
        created_at,expired_at) 
                VALUES ('$nameads', '$typeads', '$ownerads', '$emailads','$phoneads','$webads','$priceads','enabled','$user',
                '$codeads',current_timestamp,'$expiredads');";
		$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_create_new_ads']."\");";
				echo "window.location.href = \"ads.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=ads.php\"></noscript></head><body><noscript>".$lang['success_create_new_ads']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_create_new_ads']."\");";
					echo "window.location.href = \"ads.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=ads.php\"></noscript></head><body><noscript>".$lang['failed_create_new_ads']."</noscript></body></html>";
					}
}

// Process update ads
if (isset($_POST['update_ads'])) {
    // membaca id file yang akan diupdate
    $id_ads      = safe($_GET['id_ads']);
    $nameads = safe($_POST['nameads']);
    $ownerads = safe($_POST['ownerads']);
    $emailads = safe($_POST['emailads']);
    $phoneads = safe($_POST['phoneads']);
    $webads = safe($_POST['webads']);
    $priceads = safe($_POST['priceads']);
    $typeads = safe($_POST['typeads']);
    $expiredads = date('Y-m-d',strtotime(safe($_POST['expiredads']))).' '.date('h:i:s');
    $codeads = safe($_POST['codeads']);	

    // query untuk menghapus informasi file berdasarkan id
    $query = "UPDATE advertise 
            SET name_ads='$nameads', type_ads='$typeads', name='$ownerads', email='$emailads', phone='$phoneads', website='$webads',
            harga_ads='$priceads', username='$user', expired_at='$expiredads', code_ads='$codeads'  
            WHERE id_ads = $id_ads";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_update_ads']."\");";
				echo "window.location.href = \"ads.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=ads.php\"></noscript></head><body><noscript>".$lang['success_update_ads']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_update_ads']."\");";
					echo "window.location.href = \"ads.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=ads.php\"></noscript></head><body><noscript>".$lang['failed_update_ads']."</noscript></body></html>";
					}
}

// Process enabled ads
if (isset($_POST['enabled_ads'])) {
    // membaca id file yang akan diupdate
    $id_ads      = safe($_GET['id_ads']);

    // query untuk menghapus informasi file berdasarkan id
    $query = "UPDATE advertise SET status_ads='enabled' WHERE id_ads = $id_ads";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_enable_ads']."\");";
				echo "window.location.href = \"ads.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=ads.php\"></noscript></head><body><noscript>".$lang['success_enable_ads']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_enable_ads']."\");";
					echo "window.location.href = \"ads.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=ads.php\"></noscript></head><body><noscript>".$lang['failed_enable_ads']."</noscript></body></html>";
					}
}

// Process disabled ads
if (isset($_POST['disabled_ads'])) {
    // membaca id file yang akan diupdate
    $id_ads      = safe($_GET['id_ads']);

    // query untuk menghapus informasi file berdasarkan id
    $query = "UPDATE advertise SET status_ads='disabled' WHERE id_ads = $id_ads";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_disable_ads']."\");";
				echo "window.location.href = \"ads.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=ads.php\"></noscript></head><body><noscript>".$lang['success_disable_ads']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_disable_ads']."\");";
					echo "window.location.href = \"ads.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=ads.php\"></noscript></head><body><noscript>".$lang['failed_disable_ads']."</noscript></body></html>";
					}
}

// Process delete ads
if (isset($_POST['delete_ads'])) {
	
    // membaca id file yang akan dihapus
    $id_ads      = $_GET['id_ads'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "DELETE FROM advertise WHERE id_ads = $id_ads";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_delete_ads']."\");";
				echo "window.location.href = \"ads.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=ads.php\"></noscript></head><body><noscript>".$lang['success_delete_ads']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_delete_ads']."\");";
					echo "window.location.href = \"ads.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=ads.php\"></noscript></head><body><noscript>".$lang['failed_delete_ads']."</noscript></body></html>";
					}
}