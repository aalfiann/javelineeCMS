<?php session_start(); include '../../../acp/config.php'; include_once $root.'/acp/model/set.lang.php';

// Header
if (isset($_POST['save_header'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../header.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['header']."\");";
			echo "window.location.href = \"edit.header.php\";";			
			echo "</script>";
    }

// Navigation
if (isset($_POST['save_navigation'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../navigation.php", "w");
		fwrite($fp, $process);
		fclose($fp);
		echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['navigation']."\");";
			echo "window.location.href = \"edit.navigation.php\";";			
			echo "</script>";
    }
    
// Section Body
if (isset($_POST['save_body'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../body.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['body']."\");";
			echo "window.location.href = \"edit.body.php\";";			
			echo "</script>";
    }

    
// Section Footer
if (isset($_POST['save_footer'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../footer.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['footer']."\");";
			echo "window.location.href = \"edit.footer.php\";";			
			echo "</script>";
    }
    
// Section Body JS
if (isset($_POST['save_component'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../body.js.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['component']."\");";
			echo "window.location.href = \"edit.body.js.php\";";			
			echo "</script>";
    }
    
// Page Navigation
if (isset($_POST['save_p_navigation'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../p.navigation.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['navigation_page']."\");";
			echo "window.location.href = \"edit.p.navigation.php\";";			
			echo "</script>";
    }    
    
// Hashtag
if (isset($_POST['save_hashtag'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../hashtag.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['hashtag_page']."\");";
			echo "window.location.href = \"edit.hashtag.php\";";			
			echo "</script>";
    }
    
// Static Page
if (isset($_POST['save_static_page'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../page.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['static_page']."\");";
			echo "window.location.href = \"edit.page.php\";";			
			echo "</script>";
    }
    
// Read Page
if (isset($_POST['save_read_page'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../read.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['read_page']."\");";
			echo "window.location.href = \"edit.read.php\";";			
			echo "</script>";
    }
    
// Category Page
if (isset($_POST['save_category'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../category.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['category_page']."\");";
			echo "window.location.href = \"edit.category.php\";";			
			echo "</script>";
    }
    
// Post Page
if (isset($_POST['save_post'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../post.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['post_page']."\");";
			echo "window.location.href = \"edit.post.php\";";			
			echo "</script>";
    }
    
// Forum Page
if (isset($_POST['save_forum_page'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../forum.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['forum_page']."\");";
			echo "window.location.href = \"edit.forum.php\";";			
			echo "</script>";
    }
    
// Search Page
if (isset($_POST['save_search_page'])) {
	if (get_magic_quotes_gpc()) {
    		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    		while (list($key, $val) = each($process)) {
        		foreach ($val as $k => $v) {
            			unset($process[$key][$k]);
            				if (is_array($v)) {
                				$process[$key][stripslashes($k)] = $v;
                				$process[] = &$process[$key][stripslashes($k)];
            				} else {
                				$process[$key][stripslashes($k)] = stripslashes($v);
         				}
        		}
    		}
    		unset($process);
	}
		$process = $_POST['content'];
		$fp = fopen("../search.php", "w");
		fwrite($fp, $process);
		fclose($fp);
			echo "<script language=\"javascript\">";
			echo "alert(\"".$lang['success_editing']." ".$lang['search_page']."\");";
			echo "window.location.href = \"edit.search.php\";";			
			echo "</script>";
    }