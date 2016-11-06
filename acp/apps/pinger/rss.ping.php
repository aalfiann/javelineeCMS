<?php
include 'ping.php';
    
    if (!empty($_POST['blogsearch'])) {$pinger = new pinger; $pinger->PingRSS($host.'?p=rss', 'blogsearch');}
    if (!empty($_POST['weblogs'])) {$pinger = new pinger; $pinger->PingRSS($host.'?p=rss', 'weblogs');}
    if (!empty($_POST['blogs'])) {$pinger = new pinger; $pinger->PingRSS($host.'?p=rss', 'blogs');}
    if (!empty($_POST['feedburner'])) {$pinger = new pinger; $pinger->PingRSS($host.'?p=rss', 'feedburner');}
?>