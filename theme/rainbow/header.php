    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  

    <?=FrontMeta()?>
    <?=getMeta()?>
    <?=ogHomeFacebook()?>
    <?=ogHomeTwitter()?>
    <?=oEmbed()?>
    <!-- Bootstrap Core CSS -->
    <link href="<?php theme::url('css/'.$otheme['style'].'.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php theme::url('css/scrolling-nav-'.$otheme['color'].'.css')?>" rel="stylesheet">
    <link href="<?php theme::url('css/javelinee-bootstrap.css')?>" rel="stylesheet">
    <link href="<?php theme::url('favicon.ico')?>" rel="shortcut icon">
    
    <!-- Custom Fonts -->
    <link href="<?php theme::url('font-awesome-4.1.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?=GetZopim()?>