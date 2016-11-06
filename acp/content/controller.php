<?php
ob_start();
include '../config.php';
include $root.'/acp/model/check.php';
include $root.'/acp/model/database.php';
include $root.'/acp/model/pagination.php';
include $root.'/acp/model/safe.php'; 
include $root.'/acp/model/format.php';
include $root.'/acp/model/set.lang.php';

//======CATEGORY POST==================

// Create new category post
if (isset($_POST['create_cat_post'])) {
		$namecatpost = safe($_POST['namecatpost']);
		$query = "INSERT INTO cat_post (name_cat_post) VALUES('$namecatpost')";
		$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_create_new_category']."\");";
				echo "window.location.href = \"category.post.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.post.php\"></noscript></head><body><noscript>".$lang['success_create_new_category']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_create_new_category']."\");";
					echo "window.location.href = \"category.post.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.post.php\"></noscript></head><body><noscript>".$lang['failed_create_new_category']."</noscript></body></html>";
					}
}

// Process update category post
if (isset($_POST['update_cat_post'])) {
    // membaca id file yang akan diupdate
    $id_cat_post      = safe($_GET['id_cat_post']);
    $namecatpost      = safe($_POST['namecatpost']);

    // query untuk menghapus informasi file berdasarkan id
    $query = "UPDATE cat_post SET name_cat_post='$namecatpost' WHERE id_cat_post = $id_cat_post";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_update_category']."\");";
				echo "window.location.href = \"category.post.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.post.php\"></noscript></head><body><noscript>".$lang['success_update_new_category']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_update_category']."\");";
					echo "window.location.href = \"category.post.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.post.php\"></noscript></head><body><noscript>".$lang['failed_update_new_category']."</noscript></body></html>";
					}
}

// Process delete category post
if (isset($_POST['delete_cat_post'])) {
	
    // membaca id file yang akan dihapus
    $id_cat_post      = safe($_GET['id_cat_post']);

    // query untuk menghapus informasi file berdasarkan id
    $query = "DELETE FROM cat_post WHERE id_cat_post = $id_cat_post";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_delete_category']."\");";
				echo "window.location.href = \"category.post.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.post.php\"></noscript></head><body><noscript>".$lang['success_delete_category']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_delete_category']."\");";
					echo "window.location.href = \"category.post.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=category.post.php\"></noscript></head><body><noscript>".$lang['failed_delete_category']."</noscript></body></html>";
					}
}

//======CREATE PAGE==================

// Publish page
if (isset($_POST['publish_page'])) {
$titlepage = safe($_POST['titlepage']);
$createslug = create_slug($_POST['titlepage']);
$contentpage = safe($_POST['contentpage']);
$imgpage = filter_var(safe($_POST['imgpage']), FILTER_SANITIZE_URL);
$metatitlepage = safe($_POST['metatitlepage']);
$metakeywordspage = safe($_POST['metakeywordspage']);
$metadescriptionspage = safe($_POST['metadescriptionspage']);

	
								$query = "INSERT INTO page 
								(t_page,c_page,img_page,slug,mt_page,mk_page,md_page,status_page) 
								VALUES('$titlepage', '$contentpage', '$imgpage', '$createslug', '$metatitlepage', '$metakeywordspage', '$metadescriptionspage', 'published')";
								$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_create_new_page']."\");";
				echo "window.location.href = \"page.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=page.php\"></noscript></head><body><noscript>".$lang['success_create_new_page']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_create_new_page']."\");";
					echo "window.location.href = \"page.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=page.php\"></noscript></head><body><noscript>".$lang['failed_create_new_page']."</noscript></body></html>";
					}
}

// Save to draft page
if (isset($_POST['draft_page'])) {
$titlepage = safe($_POST['titlepage']);
$createslug = create_slug($_POST['titlepage']);
$contentpage = safe($_POST['contentpage']);
$imgpage = filter_var(safe($_POST['imgpage']), FILTER_SANITIZE_URL);
$metatitlepage = safe($_POST['metatitlepage']);
$metakeywordspage = safe($_POST['metakeywordspage']);
$metadescriptionspage = safe($_POST['metadescriptionspage']);
								$query = "INSERT INTO page 
								(t_page,c_page,img_page,slug,mt_page,mk_page,md_page,status_page) 
								VALUES('$titlepage', '$contentpage', '$imgpage', '$createslug','$metatitlepage', '$metakeywordspage', '$metadescriptionspage', 'draft')";
								$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_draft_page']."\");";
				echo "window.location.href = \"page.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=page.php\"></noscript></head><body><noscript>".$lang['success_draft_page']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_draft_page']."\");";
					echo "window.location.href = \"page.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=page.php\"></noscript></head><body><noscript>".$lang['success_draft_page']."</noscript></body></html>";
					}
}

// Update and Move to draft page
if (isset($_POST['move_draft'])) {
$id_page = safe($_GET['id']);
$titlepage = safe($_POST['titlepage']);
$createslug = create_slug($_POST['titlepage']);
$contentpage = safe($_POST['contentpage']);
$imgpage = filter_var(safe($_POST['imgpage']), FILTER_SANITIZE_URL);
$metatitlepage = safe($_POST['metatitlepage']);
$metakeywordspage = safe($_POST['metakeywordspage']);
$metadescriptionspage = safe($_POST['metadescriptionspage']);
	
	$query = "UPDATE page SET t_page='$titlepage', c_page='$contentpage', img_page='$imgpage', slug='$createslug', mt_page='$metatitlepage', mk_page='$metakeywordspage', md_page='$metadescriptionspage', status_page='draft' WHERE id_page = $id_page";
	$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_update_draft_page']."\");";
				echo "window.location.href = \"page.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=page.php\"></noscript></head><body><noscript>".$lang['success_update_draft_page']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_update_draft_page']."\");";
					echo "window.location.href = \"page.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=page.php\"></noscript></head><body><noscript>".$lang['success_update_draft_page']."</noscript></body></html>";
					}
}

// Update and Publish page
if (isset($_POST['update_page'])) {
$id_page = safe($_GET['id']);
$titlepage = safe($_POST['titlepage']);
$createslug = create_slug($_POST['titlepage']);
$contentpage = safe($_POST['contentpage']);
$imgpage = filter_var(safe($_POST['imgpage']), FILTER_SANITIZE_URL);
$metatitlepage = safe($_POST['metatitlepage']);
$metakeywordspage = safe($_POST['metakeywordspage']);
$metadescriptionspage = safe($_POST['metadescriptionspage']);
	
	$query = "UPDATE page SET t_page='$titlepage', c_page='$contentpage', img_page='$imgpage', slug='$createslug', mt_page='$metatitlepage', mk_page='$metakeywordspage', md_page='$metadescriptionspage', status_page='published' WHERE id_page = $id_page";
	$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_update_publish_page']."\");";
				echo "window.location.href = \"page.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=page.php\"></noscript></head><body><noscript>".$lang['success_update_publish_page']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_update_publish_page']."\");";
					echo "window.location.href = \"page.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=page.php\"></noscript></head><body><noscript>".$lang['failed_update_publish_page']."</noscript></body></html>";
					}
}

// Delete page
if (isset($_POST['delete_page'])) {
$id_page = safe($_GET['id']);

	
	$query = "DELETE FROM page WHERE id_page = $id_page";
	$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_delete_page']."\");";
				echo "window.location.href = \"page.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=page.php\"></noscript></head><body><noscript>".$lang['success_delete_page']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_delete_page']."\");";
					echo "window.location.href = \"page.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=page.php\"></noscript></head><body><noscript>".$lang['failed_delete_page']."</noscript></body></html>";
					}
}

//======CREATE POST==================

// Publish post
if (isset($_POST['publish_post'])) {
$titlepost = safe($_POST['titlepost']);
$createslug = create_slug($_POST['titlepost']);
$contentpost = safe($_POST['contentpost']);
$imgpost = filter_var(safe($_POST['imgpost']), FILTER_SANITIZE_URL);
$catpost = safe($_POST['catpost']);
$hashpost = safe($_POST['hashpost']);
$metatitlepost = safe($_POST['metatitlepost']);
$metakeywordspost = safe($_POST['metakeywordspost']);
$metadescriptionspost = safe($_POST['metadescriptionspost']);

								$query = "INSERT INTO post 
								(t_post,c_post,img_post,cat_post,hash_post,slug,mt_post,mk_post,md_post,username,date_post,status_post) 
								VALUES('$titlepost', '$contentpost', '$imgpost', '$catpost', '$hashpost', '$createslug', '$metatitlepost', '$metakeywordspost', '$metadescriptionspost', '$user', current_timestamp, 'published')";
								$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_create_new_post']."\");";
				echo "window.location.href = \"post.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=post.php\"></noscript></head><body><noscript>".$lang['success_create_new_post']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_create_new_post']."\");";
					echo "window.location.href = \"post.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=post.php\"></noscript></head><body><noscript>".$lang['failed_create_new_post']."</noscript></body></html>";
					}
}

// Save to draft post
if (isset($_POST['draft_post'])) {
$titlepost = safe($_POST['titlepost']);
$createslug = create_slug($_POST['titlepost']);
$contentpost = safe($_POST['contentpost']);
$imgpost = filter_var(safe($_POST['imgpost']), FILTER_SANITIZE_URL);
$catpost = safe($_POST['catpost']);
$hashpost = safe($_POST['hashpost']);
$metatitlepost = safe($_POST['metatitlepost']);
$metakeywordspost = safe($_POST['metakeywordspost']);
$metadescriptionspost = safe($_POST['metadescriptionspost']);

								$query = "INSERT INTO post 
								(t_post,c_post,img_post,cat_post,hash_post,slug,mt_post,mk_post,md_post,username,date_post,status_post) 
								VALUES('$titlepost', '$contentpost', '$imgpost', '$catpost', '$hashpost', '$createslug', '$metatitlepost', '$metakeywordspost', '$metadescriptionspost', '$user', current_timestamp, 'draft')";
								$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_draft_post']."\");";
				echo "window.location.href = \"post.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=post.php\"></noscript></head><body><noscript>".$lang['success_draft_post']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_draft_post']."\");";
					echo "window.location.href = \"post.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=post.php\"></noscript></head><body><noscript>".$lang['failed_draft_post']."</noscript></body></html>";
					}
}

// Update and Move to draft post
if (isset($_POST['move_draft_post'])) {
$id_post = safe($_GET['id']);
$titlepost = safe($_POST['titlepost']);
$createslug = create_slug($_POST['titlepost']);
$contentpost = safe($_POST['contentpost']);
$imgpost = filter_var(safe($_POST['imgpost']), FILTER_SANITIZE_URL);
$catpost = safe($_POST['catpost']);
$hashpost = safe($_POST['hashpost']);
$metatitlepost = safe($_POST['metatitlepost']);
$metakeywordspost = safe($_POST['metakeywordspost']);
$metadescriptionspost = safe($_POST['metadescriptionspost']);
	
	$query = "UPDATE post SET t_post='$titlepost', c_post='$contentpost', img_post='$imgpost', cat_post='$catpost', hash_post='$hashpost', slug='$createslug', mt_post='$metatitlepost', mk_post='$metakeywordspost', md_post='$metadescriptionspost', status_post='draft', updated_by='".$user."' WHERE id_post = $id_post";
	$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_update_draft_post']."\");";
				echo "window.location.href = \"post.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=post.php\"></noscript></head><body><noscript>".$lang['success_update_draft_post']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_update_draft_post']."\");";
					echo "window.location.href = \"post.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=post.php\"></noscript></head><body><noscript>".$lang['failed_update_draft_post']."</noscript></body></html>";
					}
}

// Update and publish post
if (isset($_POST['update_post'])) {
$id_post = safe($_GET['id']);
$titlepost = safe($_POST['titlepost']);
$createslug = create_slug($_POST['titlepost']);
$contentpost = safe($_POST['contentpost']);
$imgpost = filter_var(safe($_POST['imgpost']), FILTER_SANITIZE_URL);
$catpost = safe($_POST['catpost']);
$hashpost = safe($_POST['hashpost']);
$metatitlepost = safe($_POST['metatitlepost']);
$metakeywordspost = safe($_POST['metakeywordspost']);
$metadescriptionspost = safe($_POST['metadescriptionspost']);
	
	$query = "UPDATE post SET t_post='$titlepost', c_post='$contentpost', img_post='$imgpost', cat_post='$catpost', hash_post='$hashpost', slug='$createslug', mt_post='$metatitlepost', mk_post='$metakeywordspost', md_post='$metadescriptionspost', status_post='published', updated_by='".$user."' WHERE id_post = $id_post";
	$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_update_publish_post']."\");";
				echo "window.location.href = \"post.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=post.php\"></noscript></head><body><noscript>".$lang['success_update_publish_post']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_update_publish_post']."\");";
					echo "window.location.href = \"post.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=post.php\"></noscript></head><body><noscript>".$lang['failed_update_publish_post']."</noscript></body></html>";
					}
}

// Delete post
if (isset($_POST['delete_post'])) {
$id_post = safe($_GET['id']);
	
	$query = "DELETE FROM post WHERE id_post = $id_post";
	$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_delete_post']."\");";
				echo "window.location.href = \"post.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=post.php\"></noscript></head><body><noscript>".$lang['success_delete_post']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_delete_post']."\");";
					echo "window.location.href = \"post.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=post.php\"></noscript></head><body><noscript>".$lang['failed_delete_post']."</noscript></body></html>";
					}
}

//====== WIDGET ==================

// Create new widget
if (isset($_POST['create_widget'])) {
$namewidget = safe($_POST['namewidget']);
$codewidget = safe($_POST['codewidget']);								
								$query = "INSERT INTO widget (name_widget,code_widget,status_widget,position) VALUES ('$namewidget', '$codewidget', 'enabled', '1')";
								$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_create_new_widget']."\");";
				echo "window.location.href = \"widget.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=widget.php\"></noscript></head><body><noscript>".$lang['success_create_new_widget']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_create_new_widget']."\");";
					echo "window.location.href = \"widget.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=widget.php\"></noscript></head><body><noscript>".$lang['failed_create_new_widget']."</noscript></body></html>";
					}
}

// Process update order
if (isset($_GET['do'])) {
    // membaca id file yang akan diupdate
    		$id_widget = safe($_GET['id']);
    		$order_widget = safe($_GET['position']);

    		// query untuk menghapus informasi file berdasarkan id
    		$query = "UPDATE widget SET position='$order_widget' WHERE id_widget = $id_widget";
    		$process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "window.location.href = \"widget.php\";";			
				echo "</script>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_order_widget']."\");";
					echo "window.location.href = \"widget.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=widget.php\"></noscript></head><body><noscript>".$lang['failed_order_widget']."</noscript></body></html>";
					}
}

// Process update widget
if (isset($_POST['update_widget'])) {
    // membaca id file yang akan diupdate
    $id_widget      = safe($_GET['id_widget']);
    $namewidget      = safe($_POST['namewidget']);
    $codewidget      = safe($_POST['codewidget']);

    // query untuk menghapus informasi file berdasarkan id
    $query = "UPDATE widget SET name_widget='$namewidget', code_widget='$codewidget' WHERE id_widget = $id_widget";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_update_widget']."\");";
				echo "window.location.href = \"widget.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=widget.php\"></noscript></head><body><noscript>".$lang['success_update_widget']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_update_widget']."\");";
					echo "window.location.href = \"widget.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=widget.php\"></noscript></head><body><noscript>".$lang['failed_update_widget']."</noscript></body></html>";
					}
}

// Process enabled widget
if (isset($_POST['enabled_widget'])) {
    // membaca id file yang akan diupdate
    $id_widget      = safe($_GET['id_widget']);

    // query untuk menghapus informasi file berdasarkan id
    $query = "UPDATE widget SET status_widget='enabled' WHERE id_widget = $id_widget";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_enable_widget']."\");";
				echo "window.location.href = \"widget.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=widget.php\"></noscript></head><body><noscript>".$lang['success_enable_widget']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_enable_widget']."\");";
					echo "window.location.href = \"widget.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=widget.php\"></noscript></head><body><noscript>".$lang['failed_enable_widget']."</noscript></body></html>";
					}
}

// Process disabled widget
if (isset($_POST['disabled_widget'])) {
    // membaca id file yang akan diupdate
    $id_widget      = safe($_GET['id_widget']);

    // query untuk menghapus informasi file berdasarkan id
    $query = "UPDATE widget SET status_widget='disabled' WHERE id_widget = $id_widget";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_disable_widget']."\");";
				echo "window.location.href = \"widget.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=widget.php\"></noscript></head><body><noscript>".$lang['success_disable_widget']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_disable_widget']."\");";
					echo "window.location.href = \"widget.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=widget.php\"></noscript></head><body><noscript>".$lang['failed_disable_widget']."</noscript></body></html>";
					}
}

// Process delete widget
if (isset($_POST['delete_widget'])) {
	
    // membaca id file yang akan dihapus
    $id_widget      = $_GET['id_widget'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "DELETE FROM widget WHERE id_widget = $id_widget";
    $process = mysql_query($query);

    		if($process) {
    			echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['success_delete_widget']."\");";
				echo "window.location.href = \"widget.php\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=widget.php\"></noscript></head><body><noscript>".$lang['success_delete_widget']."</noscript></body></html>";
				}else {
					echo "<script language=\"javascript\">";
					echo "alert(\"".$lang['failed_delete_widget']."\");";
					echo "window.location.href = \"widget.php\";";			
					echo "</script>";
					echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=widget.php\"></noscript></head><body><noscript>".$lang['failed_delete_widget']."</noscript></body></html>";
					}
}