<?php
    include '../../acp/config.php';
    include $root.'acp/model/dev.mode.php';
    include $root.'theme/'.$site['theme'].'/class/class.portfolio.php';

    portfolio::ShowResult();
?>