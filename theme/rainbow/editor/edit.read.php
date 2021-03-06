<?php 
session_start();
include '../../../acp/config.php'; 
include $root.'/acp/model/theme.php';
include_once $root.'/acp/model/set.lang.php';

// Parameter for editing
	$titlelayout = "".$lang['layout_editor']." ".$lang['read_page']."";
	$savebutton = "save_read_page";
	echo edit($layout = "read.php");
 ?>


<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?php echo $titlelayout ?> - <?php echo $site['title'] ?> Admin Control Panel</title>
  <meta name="description" content="<?php echo $titlelayout ?> - <?php echo $site['title'] ?> Admin Control Panel" />
  <?php include $root.'/acp/header.acp.php'; ?>
  <?php echo EditArea()?>

</head>
<body class="">
  <section class="vbox">
    <header class="bg-<?php echo $site['color'] ?> header header-md navbar navbar-fixed-top-xs box-shadow">
      <?php include $root.'/acp/header.aside.php'; ?>    
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-light lt b-r b-light aside-md hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
               <?php include $root.'/acp/header.side.php'; ?>					
					           


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                 <?php include $root.'/acp/nav.side.php'; ?>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
             <?php include $root.'/acp/footer.side.php'; ?>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <?php include $root.'/acp/header.about.php'; ?>
            
            <section class="scrollable wrapper w-f">
            <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><?php echo $lang['warning_edit'] ?>
                  </div>
                <section class="panel panel-default">                
                <header class="panel-heading font-bold">
                  <?php echo $titlelayout ?>
                </header>
                <div class="panel-body">
                
                <form action="<?php echo $host ?>/theme/<?php echo $site['theme']?>/editor/save.controller.php" method="post" class="form-horizontal">
					 <textarea id="textarea_1" name="content" class="form-control" rows="20" ><?php echo $content_old ?></textarea>
					 <div class="line line-dashed b-b line-lg pull-in"></div>
                	<div class="pull-right">      
                  	<button type="submit" name="<?php echo $savebutton ?>" class="btn btn-<?php echo $site['color'] ?>"><?php echo $lang['button_save_change'] ?></button>
                  </div>
					 </form>
                </div>
                </section>
                
               
            
            </section>
            <footer class="footer bg-white b-t b-light">
              <?php include $root.'/acp/footer.aside.php'; ?>
            </footer>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
  <?php include $root.'/acp/body.js.php'; ?>
</body>
</html>