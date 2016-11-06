<?php  include '../../config.php'; include $root.'/acp/model/check.php';
include $root.'/acp/model/database.php'; include $root.'/acp/model/pagination.php';
include $root.'/acp/model/media.php'; include $root.'/acp/model/safe.php'; 
include $root.'/acp/model/set.lang.php';
include 'mediaconfig.php'; 	echo search_file(); ?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?= $lang['result_search_file'] ?> | <?= $site['title'] ?> Admin Control Panel</title>
  <meta name="description" content="<?= $lang['result_search_file'] ?> | <?= $site['title'] ?> Admin Control Panel" />
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
              <form action="<?= $host ?>acp/apps/media/search.file.php" method="get" class="m-t-sm pull-right pull-none-xs input-s-lg m-b-sm">
                <div class="input-group">
                    <input type="text" id="address" name="q" class="input-sm form-control" placeholder="<?= $lang['search_file'] ?>">
                    <span class="input-group-btn">
                      <button class="btn btn-sm btn-default" type="submit">Go!</button>
                    </span>
                </div>
              </form>
            </header>
            <?php include 'modal.php'; ?>
            <section class="scrollable wrapper w-f">
              <?php include 'form.file.search.php'; ?>
              		  
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