<?php 
session_start();
include '../../../acp/config.php'; 
include '../info.php';
include 'config.php';
include_once $root.'/acp/model/set.lang.php';

// Parameter for editing
	$titlelayout = "".$lang['setting']." Layout";
	$savebutton = "save_option";
 ?>


<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?php echo $titlelayout ?> - <?php echo $site['title'] ?> Admin Control Panel</title>
  <meta name="description" content="<?php echo $titlelayout ?> - <?php echo $site['title'] ?> Admin Control Panel" />
  <?php include $root.'/acp/header.acp.php'; ?>

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
            <div class="well">
                    <p><b>Name:</b> <?=$name_theme?> <?=$version_theme?><br>
                    <b>Author:</b> <?=$author_theme?> - <a href="<?=$url_author_theme?>" target="_blank"><?=$url_author_theme?></a>
                    <hr>
                    <b>Descriptions:</b> <br><?=$description_theme?><br><br>
                    - <b><?=$component_theme?></b></p>
                  </div>
                <section class="panel panel-default">                
                <header class="panel-heading font-bold">
                  <?php echo $titlelayout ?>
                </header>
                <div class="panel-body">
                
                <?php include 'form.php';?>
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