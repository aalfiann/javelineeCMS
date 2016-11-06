<?php
/* Do not use these options in a production environment.
 * Default display_errors is OFF */
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('display_errors','off');
$dev['suspended'] = "false";
$dev['maintenance'] = "false";
date_default_timezone_set('Asia/Jakarta');
?>