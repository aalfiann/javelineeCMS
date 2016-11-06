<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=SearchMeta()?>
    <?=GetMeta()?>
    <?=ogSearchFacebook()?>
    <?=ogSearchTwitter()?>
    <?=oEmbed()?>
    <link href="<?php theme::url('favicon.ico')?>" rel="shortcut icon">
    
    <!-- Bootstrap Core CSS -->
    <link href="<?php theme::url('assets/css/rainbow/'.$otheme['style'].'.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php theme::url('assets/css/rainbow/javelinee-bootstrap.css')?>" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="<?php theme::url('assets/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
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
                <?=BreadSearch()?>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <!-- Blog Content -->
            <div class="col-md-8">
                <?= Custom::ShowAdvertise('728x90');?>
                <?=TitleResult()?>
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
        