<?php include $root.'acp/apps/supercache/top-cache.php'; session_start(); echo FindCategory(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">	 
    <title><?= $data['mt_post'].' - '.$site['title']?></title>    
    <meta name="keywords" content="<?= $data['mk_post']?>">		
	 <meta name="description" content="<?= $data['md_post']?>">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <?=GetMeta(); ?>
     <?=ogReadFacebook()?>
     <?=ogReadTwitter()?>
    <link href="<?php theme::url('favicon.ico')?>" rel="shortcut icon">
    
    <!-- Bootstrap Core CSS -->
    <link href="<?php theme::url('css/'.$otheme['style'].'.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php theme::url('css/javelinee-bootstrap.css')?>" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="<?php theme::url('font-awesome-4.1.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?=ShareCode()?>
	</head>
	
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
		
	<!--start navigation-->
		<?php include 'p.navigation.php'; ?>
	<!--end navigation-->
	
	<!-- Page Content -->
    <div class="container">
		
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <?=BreadRead()?>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            
            <!-- Blog Content -->
            <div class="col-md-8">
                <?= Custom::ShowAdvertise('728x90');?>
                <?= ReadPost() ?>
					<hr>
					<?= ShareThis() ?>
						<br>
    					<?php if ($comment['disqus'] != null) echo comment(); ?>
                <?= Custom::ShowAdvertise('728x90');?>
            </div>

            <!-- Blog Sidebar Widgets -->
            <div class="col-md-4">
                <?php include 'sidebar.php';?>               
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    
    	<!--start footer-->
			<?php include 'footer.php'; ?>
		<!--end footer-->
		
	   <?php include 'body.js.php' ?>
    
    </body>
</html>
<?php include $root.'acp/apps/supercache/bottom-cache.php'; ?>        