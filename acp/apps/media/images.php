<?php
ob_start();
include '../../config.php'; 
include $root.'/acp/model/check.php';
include $root.'/acp/model/database.php'; 
include $root.'/acp/model/pagination.php'; 
include $root.'/acp/model/media.php'; 
include $root.'/acp/model/safe.php';
include_once $root.'/acp/model/set.lang.php'; 
include 'mediaconfig.php'; echo data_img(); ?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?= $lang['media_image'] ?> - <?= $site['title'] ?> Admin Control Panel</title>
  <meta name="description" content="<?= $lang['media_image'] ?> | <?= $site['title'] ?> Admin Control Panel" />
  <?php include $root.'/acp/header.acp.php'; ?>
</head>
<body class="">
  <section class="vbox">
    <header class="bg-<?= $site['color'] ?> header header-md navbar navbar-fixed-top-xs box-shadow">
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
            <header class="header bg-light lt b-b b-light">
              <p class="h4 font-thin pull-left m-r m-b-sm"><?= $lang['upload_media'] ?></p>
              <a  data-dismiss="modal" data-toggle="modal" href="#upload" class="btn btn-sm btn-info btn-rounded btn-icon"><i class="i i-cloud-upload"></i></a>
              <form action="<?= $host ?>/acp/apps/media/search.img.php" method="get" class="m-t-sm pull-right pull-none-xs input-s-lg m-b-sm">
                <div class="input-group">
                    <input type="text" id="address" name="q" class="input-sm form-control" placeholder="<?= $lang['search_images'] ?>">
                    <span class="input-group-btn">
                      <button class="btn btn-sm btn-default" type="submit">Go!</button>
                    </span>
                </div>
              </form>
            </header>
            <?php include 'modal.php'; ?>
            <section class="scrollable wrapper w-f">
              <?php include 'form.media.php'; ?>
              
		              <ul class="pagination pagination-sm m-t-none m-b-none">
                      <li><a href="<?php if ($noPage > 1) echo $_SERVER['PHP_SELF'].'?page='.($noPage-1) ?>" class="btn btn-default"><i class="i i-arrow-left4"></i></a></li>
							 <li><a href="#"><?= $lang['page'] ?> <?= $noPage ?></a></li>                      
                      <li><a href="<?= $_SERVER['PHP_SELF'].'?page='.($noPage+1) ?>" class="btn btn-default"><i class="i i-arrow-right4"></i></a></li>
                    </ul>
                    <div class="pull-right"><?= $lang['total_images'] ?> <strong><?= $jumData?></strong></div>
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