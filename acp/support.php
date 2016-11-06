<?php include 'config.php'; include 'model/check.php'; include_once 'model/set.lang.php'; ?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?= $lang['discussions_forum'] ?> | <?= $site['title'] ?> Admin Control Panel</title>
  <meta name="description" content="<?= $lang['discussions_forum'] ?> | <?= $site['title'] ?> Admin Control Panel" />
  <?php include 'header.acp.php'; ?>
</head>
<body class="">
  <section class="vbox">
    <header class="bg-<?= $site['color'] ?> header header-md navbar navbar-fixed-top-xs box-shadow">
      <?php include 'header.aside.php'; ?>    
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-light lt b-r b-light aside-md hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
               <?php include 'header.side.php'; ?>					
					           


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                 <?php include 'nav.side.php'; ?>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
             <?php include 'footer.side.php'; ?>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <?php include 'header.about.php'; ?>
            
            <section class="scrollable wrapper w-f">
              <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><?= $lang['warning_forum'] ?>
                  </div>
              <script type="text/javascript" src="http://javelinee.com/forum/js/embed.js"></script> <noscript>Please enable JavaScript to view the <a href="http://vanillaforums.com/?ref_noscript">discussions powered by Vanilla.</a></noscript> <div class="vanilla-credit"><a class="vanilla-anchor" href="http://vanillaforums.com">Discussions by <span class="vanilla-logo">Vanilla</span></a></div>
            </section>
            
            <footer class="footer bg-white b-t b-light">
              <?php include 'footer.aside.php'; ?>
            </footer>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
  <?php include 'body.js.php'; ?>
</body>
</html>