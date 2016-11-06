<?php
include 'ping.php';
    
    if (!empty($_POST['ask'])) {$pinger = new pinger; $pinger->PingSE($host.'?p=sitemap', 'ask');}
    if (!empty($_POST['bing'])) {$pinger = new pinger; $pinger->PingSE($host.'?p=sitemap', 'bing');}
    if (!empty($_POST['google'])) {$pinger = new pinger; $pinger->PingSE($host.'?p=sitemap', 'google');}
    if (!empty($_POST['moreover'])) {$pinger = new pinger; $pinger->PingSE($host.'?p=sitemap', 'moreover');}
?>
    