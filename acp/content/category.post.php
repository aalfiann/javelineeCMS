<?php 
  ob_start();
  include '../config.php';
  include $root.'/acp/model/check.php';
  include $root.'/acp/model/admin.only.php';
  include $root.'/acp/model/database.php';
  include $root.'/acp/model/pagination.php';
  include $root.'/acp/model/content.php';
  include $root.'/acp/model/safe.php'; 
  include_once $root.'/acp/model/set.lang.php'; echo category_post(); ?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?= $lang['category_post']?> | <?= $site['title'] ?> Admin Control Panel</title>
  <meta name="description" content="<?= $lang['category_post']?> | <?= $site['title'] ?> Admin Control Panel" />
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
            <?php include $root.'/acp/header.about.php';?>
            
            <section class="scrollable wrapper w-f">
                    <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><?php echo $lang['warning_category'] ?>
                  </div>
            <div class="row wrapper">
            <?php include 'form.cat.post.php'; ?>
            </div>  
            
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