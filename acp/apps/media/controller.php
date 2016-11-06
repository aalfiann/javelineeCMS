<?php 
include '../../config.php'; 
include $root.'/acp/model/check.php';
include $root.'/acp/model/database.php'; 
include $root.'/acp/model/safe.php'; 
include $root.'/acp/model/set.lang.php'; 
include 'mediaconfig.php';

//=====UPLOAD==================

// Proccess Upload Other File
if (isset($_POST['submit_upload_file'])) {

	//folder upload
	$fileFolder = '../../../upload/file/';

	// baca nama file
	$fileName = $_FILES["datafile"]["name"];
	// baca file temporary upload
	$fileTemp = $_FILES["datafile"]["tmp_name"];
	// baca tipe file
	$fileType = $_FILES["datafile"]["type"];
	// baca filesize
	$fileSize = $_FILES["datafile"]["size"];
	// deteksi error
	$fileError = $_FILES["datafile"]["error"];

	// Checking file	
	$allowedExts = array("flv", "mp3", "qt", "mov", "zip", "rar", "gif", "jpeg", "jpg", "png", "pdf", "doc", "docx", "xls", "xlsx",
	 "ppt", "pptx", "rtf", "odt", "ods", "txt", "csv", "sql","mp4", "3gp");
	$temp = explode(".", $fileName);
	$extension = end($temp);

		if ((($fileType == "image/gif")
			|| ($fileType == "image/jpeg")
			|| ($fileType == "image/jpg")
			|| ($fileType == "image/pjpeg")
			|| ($fileType == "image/x-png")
			|| ($fileType == "image/png")
			// Audio and video
			|| ($fileType == "audio/mpeg")
			|| ($fileType == "video/quicktime")
			|| ($fileType == "video/x-flv")
			|| ($fileType == "video/mp4")
			|| ($fileType == "video/3gpp")			
			// Archive
			|| ($fileType == "application/zip")
			|| ($fileType == "application/x-rar-compressed")
			// Open Office
			|| ($fileType == "application/vnd.oasis.opendocument.spreadsheet")
			|| ($fileType == "application/vnd.oasis.opendocument.text")
			// MS Office
			|| ($fileType == "text/plain")
			|| ($fileType == "application/rtf")			
			|| ($fileType == "application/pdf")
			|| ($fileType == "application/msword")
			|| ($fileType == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
			|| ($fileType == "application/vnd.ms-excel")
			|| ($fileType == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
			|| ($fileType == "application/vnd.ms-powerpoint")
			|| ($fileType == "application/vnd.openxmlformats-officedocument.presentationml.presentation")
			// Database
			|| ($fileType == "text/csv")
			|| ($fileType == "text/x-sql")
				)
					
			
			// Checking file size 			
			&& ($fileSize < $size['upload_file'])
			&& in_array($extension, $allowedExts)) {
  				if ($fileError > 0) {
    				echo "Error: " . $fileError . "<br>";
  				} else {
  					// Check file dalam table
  					$query = "SELECT count(*) as jum FROM media_file WHERE file = '$fileName'";
					$hasil = mysql_query($query);
					if (!$hasil) IsQueryError();
					
					$data  = mysql_fetch_array($hasil);
					if ($data['jum'] > 0)
						{
						$query = "UPDATE media_file SET size = '$fileSize' WHERE file = '$fileName'";
								echo "<script language=\"javascript\">";
								echo "alert(\"".$lang['failed_upload']." ".$fileName."\");";
								echo "window.location.href = \"file.php\";";			
								echo "</script>";
								echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=file.php\"></noscript></head><body><noscript>".$lang['failed_upload']."</noscript></body></html>";
						}
						else{	
							// proses upload file ke folder /upload/file/
							if (move_uploaded_file($fileTemp, $fileFolder.$fileName)){
								if ($_POST['filetitle'] == ""){
									$filetitle = $fileName;									
									} else {
									$filetitle = safe($_POST['filetitle']);
									}
								$urlfile = '/upload/file/'.$fileName;
								$catfile = safe($_POST['catfile']);
								$query = "INSERT INTO media_file (t_file,url_file,cat_file,file,size,type,date_upload,username) 
								VALUES('$filetitle', '$urlfile', '$catfile', '$fileName', '$fileSize', '$fileType', current_timestamp,'".$user."')";
								$hasil = mysql_query($query);    
    							echo "<script language=\"javascript\">";
								echo "alert(\"".$lang['success_upload']." ".$fileName."\");";
								echo "window.location.href = \"file.php\";";			
								echo "</script>";
								echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=file.php\"></noscript></head><body><noscript>".$lang['success_upload']."</noscript></body></html>";
							}else {
								echo "<script language=\"javascript\">";
								echo "alert(\"".$lang['failed_upload']." ".$fileName."\");";
								echo "window.location.href = \"file.php\";";			
								echo "</script>";
								echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=file.php\"></noscript></head><body><noscript>".$lang['failed_upload']."</noscript></body></html>";
								}
							
						}

					}
		}
	else {
  		echo "<script language=\"javascript\">";
		echo "alert(\"".$lang['invalid_upload']."\");";
		echo "window.location.href = \"file.php\";";			
		echo "</script>";
		echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=file.php\"></noscript></head><body><noscript>".$lang['invalid_upload']."</noscript></body></html>";
	}
}

// Process upload image
if (isset($_POST['submit_upload_pic'])) {

	//folder upload
	$fileFolder = '../../../upload/pic/';

	// baca nama file
	$fileName = $_FILES["datafile"]["name"];
	// baca file temporary upload
	$fileTemp = $_FILES["datafile"]["tmp_name"];
	// baca tipe file
	$fileType = $_FILES["datafile"]["type"];
	// baca filesize
	$fileSize = $_FILES["datafile"]["size"];
	// deteksi error
	$fileError = $_FILES["datafile"]["error"];

	// Checking file	
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $fileName);
	$extension = end($temp);

		if ((($fileType == "image/gif")
			|| ($fileType == "image/jpeg")
			|| ($fileType == "image/jpg")
			|| ($fileType == "image/pjpeg")
			|| ($fileType == "image/x-png")
			|| ($fileType == "image/png"))
						
			
			// Checking file size 			
			&& ($fileSize < $size['upload_img'])
			&& in_array($extension, $allowedExts)) {
  				if ($fileError > 0) {
    				echo "Error: " . $fileError . "<br>";
  				} else {
  					// Check file dalam table
  					$query = "SELECT count(*) as jum FROM media_img WHERE file = '$fileName'";
					$hasil = mysql_query($query);
					if (!$hasil) IsQueryError();
					$data  = mysql_fetch_array($hasil);
					if ($data['jum'] > 0)
						{
						$query = "UPDATE media_img SET size = '$fileSize' WHERE file = '$fileName'";
								echo "<script language=\"javascript\">";
								echo "alert(\"".$lang['failed_upload']." ".$fileName."\");";
								echo "window.location.href = \"images.php\";";			
								echo "</script>";
								echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=images.php\"></noscript></head><body><noscript>".$lang['success_upload']."</noscript></body></html>";
						}
						else {
							// proses upload file ke folder /upload/pic/
							if (move_uploaded_file($fileTemp, $fileFolder.$fileName)){
								if ($_POST['imgtitle'] == ""){
									$imgtitle = $fileName;									
									} else {
									$imgtitle = safe($_POST['imgtitle']);
									}
								if ($_POST['imgalt'] == ""){
									$imgalt = $fileName;									
									} else {
									$imgalt = safe($_POST['imgalt']);
									}

								$extimg = safe($_POST['imgext']);
								$urlimg = "/upload/pic/".$fileName;
								$catimg = safe($_POST['catimg']);
								$query = "INSERT INTO media_img (t_img,alt_img,url_img,cat_img,file,size,type,date_upload,ex_link,username) 
								VALUES('$imgtitle', '$imgalt', '$urlimg', '$catimg', '$fileName', '$fileSize', '$fileType', current_timestamp, '$extimg', '".$user."')";
								$hasil = mysql_query($query);    
    							
    							echo "<script language=\"javascript\">";
								echo "alert(\"".$lang['success_upload']." ".$fileName."\");";
								echo "window.location.href = \"images.php\";";			
								echo "</script>";
								echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=images.php\"></noscript></head><body><noscript>".$lang['success_upload']."</noscript></body></html>";
							}else {
								echo "<script language=\"javascript\">";
								echo "alert(\"".$lang['failed_upload']." ".$fileName."\");";
								echo "window.location.href = \"images.php\";";			
								echo "</script>";
								echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=images.php\"></noscript></head><body><noscript>".$lang['failed_upload']."</noscript></body></html>";
								}
							
						}
					}
		}
	else {
  		echo "<script language=\"javascript\">";
		echo "alert(\"".$lang['invalid_upload']."\");";
		echo "window.location.href = \"images.php\";";			
		echo "</script>";
		echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=images.php\"></noscript></head><body><noscript>".$lang['invalid_upload']."</noscript></body></html>";
	}
}

// Process delete image
if (isset($_POST['delete_img'])) {
   //folder upload
	$fileFolder = '../../../upload/pic/';
	
    // membaca id file yang akan dihapus
    $id_img      = $_GET['id_img'];
    
    // membaca informasi file dari tabel berdasarkan id nya
    $query  = "SELECT * FROM media_img WHERE id_img = '$id_img'";
    $hasil  = mysql_query($query);
    if (!$hasil) IsQueryError();
    $data = mysql_fetch_array($hasil);
    $dataFile = $data['file'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "DELETE FROM media_img WHERE id_img = $id_img";
    $process = mysql_query($query);

    // menghapus file dalam folder sesuai namanya
    unlink($fileFolder.$dataFile);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_delete_image']."\");";
				echo "window.location.href = \"images.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=images.php\"></noscript></head><body><noscript>".$lang['success_delete_image']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_delete_image']."\");";
					echo "window.location.href = \"images.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=images.php\"></noscript></head><body><noscript>".$lang['failed_delete_image']."</noscript></body></html>";
					}
}

// Process update image
if (isset($_POST['update_img'])) {
    // membaca id file yang akan diupdate
    $id_img      = $_GET['id_img'];
    $imgtitle      = safe($_POST['imgtitle']);
    $imgalt     = safe($_POST['imgalt']);
    $imgext = safe($_POST['imgext']);
	$imgcat = safe($_POST['catimg']);

    // query untuk mengupdate informasi file berdasarkan id
    $query = "UPDATE media_img SET t_img='$imgtitle', cat_img='$imgcat' ,alt_img='$imgalt', ex_link='$imgext', updated_by='".$user."' WHERE id_img = $id_img";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_update_image']."\");";
				echo "window.location.href = \"images.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=images.php\"></noscript></head><body><noscript>".$lang['success_update_image']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_update_image']."\");";
					echo "window.location.href = \"images.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=images.php\"></noscript></head><body><noscript>".$lang['failed_update_image']."</noscript></body></html>";
					}
}

// Process downnload image
if (isset($_POST['download_img'])) {
    // membaca id file yang akan di download
    $id_img      = $_GET['id_img'];
    
    // membaca informasi file dari tabel berdasarkan id nya
    $query  = "SELECT * FROM media_img WHERE id_img = '$id_img'";
    $hasil  = mysql_query($query);
    if (!$hasil) IsQueryError();
    $data = mysql_fetch_array($hasil);

    // header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=".$data['file']);

    // header yang menunjukkan ukuran file yang akan didownload
    header("Content-length: ".$data['size']);

	 // header yang menunjukkan jenis file yang akan didownload
    header("Content-type: ".$data['type']);

    // proses membaca isi file yang akan didownload dari folder upload/pic/
    $fp  = fopen("../../../upload/pic/".$data['file'], 'r');
    $content = fread($fp, filesize('../../../upload/pic/'.$data['file']));
    fclose($fp);
 
    // menampilkan isi file yang akan didownload
    echo $content;

    exit;	 
	 
}

//======CATEGORY IMAGE==================

// Create new category image
if (isset($_POST['create_cat_img'])) {
	$namecat = safe($_POST['namecat']);
	$query = "INSERT INTO cat_img VALUES('', '$namecat', '', 'private')";
	$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_create_category_image']."\");";
				echo "window.location.href = \"category.img.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.img.php\"></noscript></head><body><noscript>".$lang['success_create_category_image']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_create_category_image']."\");";
					echo "window.location.href = \"category.img.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.img.php\"></noscript></head><body><noscript>".$lang['failed_create_category_image']."</noscript></body></html>";
					}
}

// Process update category image
if (isset($_POST['update_cat_img'])) {
    // membaca id file yang akan diupdate
    $id_cat_img      = $_GET['id_cat_img'];
    $namecat      = safe($_POST['namecat']);
    $thumbcat      = safe($_POST['thumbnail']);


    // query untuk menghapus informasi file berdasarkan id
    $query = "UPDATE cat_img SET name_img='$namecat', thumbnail_img='$thumbcat' WHERE id_cat_img = $id_cat_img";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_update_category_image']."\");";
				echo "window.location.href = \"category.img.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.img.php\"></noscript></head><body><noscript>".$lang['success_update_category_image']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_update_category_image']."\");";
					echo "window.location.href = \"category.img.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.img.php\"></noscript></head><body><noscript>".$lang['failed_update_category_image']."</noscript></body></html>";
					}
}

// Process update category image make public
if (isset($_POST['public_cat_img'])) {
    // membaca id file yang akan diupdate
    $id_cat_img      = $_GET['id_cat_img'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "UPDATE cat_img SET view='public' WHERE id_cat_img = $id_cat_img";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_public_category_image']."\");";
				echo "window.location.href = \"category.img.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.img.php\"></noscript></head><body><noscript>".$lang['success_public_category_image']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_public_category_image']."\");";
					echo "window.location.href = \"category.img.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.img.php\"></noscript></head><body><noscript>".$lang['failed_public_category_image']."</noscript></body></html>";
					}
}

// Process update category image make private
if (isset($_POST['private_cat_img'])) {
    // membaca id file yang akan diupdate
    $id_cat_img      = $_GET['id_cat_img'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "UPDATE cat_img SET view='private' WHERE id_cat_img = $id_cat_img";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_private_category_image']."\");";
				echo "window.location.href = \"category.img.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.img.php\"></noscript></head><body><noscript>".$lang['success_private_category_image']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_private_category_image']."\");";
					echo "window.location.href = \"category.img.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.img.php\"></noscript></head><body><noscript>".$lang['failed_private_category_image']."</noscript></body></html>";
					}
}

// Process delete image
if (isset($_POST['delete_cat_img'])) {
	
    // membaca id file yang akan dihapus
    $id_cat_img      = $_GET['id_cat_img'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "DELETE FROM cat_img WHERE id_cat_img = $id_cat_img";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_delete_category_image']."\");";
				echo "window.location.href = \"category.img.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.img.php\"></noscript></head><body><noscript>".$lang['success_delete_category_image']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_delete_category_image']."\");";
					echo "window.location.href = \"category.img.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.img.php\"></noscript></head><body><noscript>".$lang['failed_delete_category_image']."</noscript></body></html>";
					}
}

//=========CATEGORY FILE=========

// Create new category file
if (isset($_POST['create_cat_file'])) {
	$namecat = safe($_POST['namecat']);
	$query = "INSERT INTO cat_file VALUES('', '$namecat', 'private')";
	$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_create_category_file']."\");";
				echo "window.location.href = \"category.file.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.file.php\"></noscript></head><body><noscript>".$lang['success_create_category_file']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_create_category_file']."\");";
					echo "window.location.href = \"category.file.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.file.php\"></noscript></head><body><noscript>".$lang['failed_create_category_file']."</noscript></body></html>";
					}
}

// Process update category file
if (isset($_POST['update_cat_file'])) {
    // membaca id file yang akan diupdate
    $id_cat      = $_GET['id_cat'];
    $namecat      = safe($_POST['namecat']);

    // query untuk mengupdate informasi file berdasarkan id
    $query = "UPDATE cat_file SET name_file='$namecat' WHERE id_cat = $id_cat";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_update_category_file']."\");";
				echo "window.location.href = \"category.file.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.file.php\"></noscript></head><body><noscript>".$lang['success_update_category_file']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_update_category_file']."\");";
					echo "window.location.href = \"category.file.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.file.php\"></noscript></head><body><noscript>".$lang['failed_update_category_file']."</noscript></body></html>";
					}
}

// Process update category file make public
if (isset($_POST['public_cat_file'])) {
    // membaca id file yang akan diupdate
    $id_cat      = $_GET['id_cat'];
   
    // query untuk mengupdate informasi file berdasarkan id
    $query = "UPDATE cat_file SET view='public' WHERE id_cat = $id_cat";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_public_category_file']."\");";
				echo "window.location.href = \"category.file.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.file.php\"></noscript></head><body><noscript>".$lang['success_public_category_file']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_public_category_file']."\");";
					echo "window.location.href = \"category.file.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.file.php\"></noscript></head><body><noscript>".$lang['failed_public_category_file']."</noscript></body></html>";
					}
}

// Process update category file make private
if (isset($_POST['private_cat_file'])) {
    // membaca id file yang akan diupdate
    $id_cat      = $_GET['id_cat'];
   
    // query untuk mengupdate informasi file berdasarkan id
    $query = "UPDATE cat_file SET view='private' WHERE id_cat = $id_cat";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_private_category_file']."\");";
				echo "window.location.href = \"category.file.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.file.php\"></noscript></head><body><noscript>".$lang['success_private_category_file']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_private_category_file']."\");";
					echo "window.location.href = \"category.file.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.file.php\"></noscript></head><body><noscript>".$lang['failed_private_category_file']."</noscript></body></html>";
					}
}

// Process delete category file
if (isset($_POST['delete_cat_file'])) {
	
    // membaca id file yang akan dihapus
    $id_cat      = $_GET['id_cat'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "DELETE FROM cat_file WHERE id_cat = $id_cat";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_delete_category_file']."\");";
				echo "window.location.href = \"category.file.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.file.php\"></noscript></head><body><noscript>".$lang['success_delete_category_file']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_delete_category_file']."\");";
					echo "window.location.href = \"category.file.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.file.php\"></noscript></head><body><noscript>".$lang['failed_delete_category_file']."</noscript></body></html>";
					}
}

//========= DATA FILE=========

// Process update data file
if (isset($_POST['update_file'])) {
    // membaca id file yang akan diupdate
    $id_file      = $_GET['id_file'];
    $namefile      = safe($_POST['namefile']);
	$catfile      = safe($_POST['catfile']);

    // query untuk mengupdate informasi file berdasarkan id
    $query = "UPDATE media_file SET t_file='$namefile',cat_file='$catfile', updated_by='".$user."' WHERE id_file = $id_file";
    $process = mysql_query($query);
    		
    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_update_file']."\");";
				echo "window.location.href = \"file.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=file.php\"></noscript></head><body><noscript>".$lang['success_update_file']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_update_file']."\");";
					echo "window.location.href = \"file.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=file.php\"></noscript></head><body><noscript>".$lang['failed_update_file']."</noscript></body></html>";
					}
				
}

// Process delete data file
if (isset($_POST['delete_file'])) {
	
	//folder upload
	$fileFolder = '../../../upload/file/';
	
    // membaca id file yang akan dihapus
    $id_file      = $_GET['id_file'];
    
    // membaca informasi file dari tabel berdasarkan id nya
    $query  = "SELECT * FROM media_file WHERE id_file = '$id_file'";
    $hasil  = mysql_query($query);
    if (!$hasil) IsQueryError();
    $data = mysql_fetch_array($hasil);
    $dataFile = $data['file'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "DELETE FROM media_file WHERE id_file = $id_file";
    $process = mysql_query($query);
    
    // menghapus file dalam folder sesuai namanya
    unlink($fileFolder.$dataFile);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_delete_file']."\");";
				echo "window.location.href = \"file.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=file.php\"></noscript></head><body><noscript>".$lang['success_delete_file']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_delete_file']."\");";
					echo "window.location.href = \"file.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=file.php\"></noscript></head><body><noscript>".$lang['failed_delete_file']."</noscript></body></html>";
					}
}

// Process downnload data file
if (isset($_POST['download_file'])) {
    // membaca id file yang akan di download
    $id_file      = $_GET['id_file'];
    
    // membaca informasi file dari tabel berdasarkan id nya
    $query  = "SELECT * FROM media_file WHERE id_file = '$id_file'";
    $hasil  = mysql_query($query);
    if (!$hasil) IsQueryError();
    
    $data = mysql_fetch_array($hasil);

    // header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=".$data['file']);

    // header yang menunjukkan ukuran file yang akan didownload
    header("Content-length: ".$data['size']);

	 // header yang menunjukkan jenis file yang akan didownload
    header("Content-type: ".$data['type']);

    // proses membaca isi file yang akan didownload dari folder upload/pic/
    $fp  = fopen("../../../upload/pic/".$data['file'], 'r');
    $content = fread($fp, filesize('../../../upload/pic/'.$data['file']));
    fclose($fp);
 
    // menampilkan isi file yang akan didownload
    echo $content;

    exit;	 
	 
}