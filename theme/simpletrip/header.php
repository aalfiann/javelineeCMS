	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
	<?=FrontMeta()?>
    	<?=getMeta()?>
    	<?=ogHomeFacebook()?>
    	<?=ogHomeTwitter()?>
    	<?=oEmbed()?>

    	<!--[if lte IE 8]><script src="<?php theme::url('css/ie/html5shiv.js')?>"></script><![endif]-->


    	<!-- Custom Fonts -->
    	<link href="<?php theme::url('font-awesome-4.1.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
        	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->

    	<!-- Custom CSS -->
	<noscript>
		<link rel="stylesheet" href="<?php theme::url('css/skel.css')?>" />
		<link rel="stylesheet" href="<?php theme::url('css/style.css')?>" />
		<link rel="stylesheet" href="<?php theme::url('css/style-wide.css')?>" />
	</noscript>
		
	<!--[if lte IE 9]><link rel="stylesheet" href="<?php theme::url('css/ie/v9.css')?>" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="<?php theme::url('css/ie/v8.css')?>" /><![endif]-->
	<?=GetZopim()?>