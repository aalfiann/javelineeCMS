    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  

    <?=FrontMeta()?>
    <?=getMeta()?>
    <?=ogHomeFacebook()?>
    <?=ogHomeTwitter()?>
    
    <link href="<?php theme::url('css/'.$otheme['style'].'.css')?>" rel="stylesheet">
    <link href="<?php theme::url('css/indocar-bootstrap.css')?>" rel="stylesheet">

    <!--[if lte IE 8]><script src="<?php theme::urls('css/ie/html5shiv.js')?>"></script><![endif]-->

    <script src="<?php theme::url('js/jquery.min.js')?>"></script>
        
        <noscript>
            <link rel="stylesheet" href="<?php theme::url('css/skel.css')?>" />
            <link rel="stylesheet" href="<?php theme::url('css/style.css')?>" />
            <link rel="stylesheet" href="<?php theme::url('css/style-xlarge.css')?>" />
        </noscript>
        <!--[if lte IE 8]><link rel="stylesheet" href="<?php theme::url('css/ie/v8.css')?>" /><![endif]-->		
    	
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?=GetZopim()?>