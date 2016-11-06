<?php include 'config.php'; include 'model/check.php'; include_once 'model/set.lang.php'; ?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?= $lang['information'] ?> - <?= $site['title'] ?> Admin Control Panel</title>
  <meta name="description" content="<?= $lang['information'] ?> - <?= $site['title'] ?> Admin Control Panel" />
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
              <p class="h4"><?= $lang['welcome_dashboard'] ?></p>
              
              <br>
              
              <section class="panel panel-default portlet-item">
                <header class="panel-heading">
                  <ul class="nav nav-pills pull-right">
                    <li>
                      <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                    </li>
                  </ul>
                  <?= $lang['javelinee_news'] ?>                     
                </header>
						<section class="panel-body">
                  <?php include('model/rss.class.php');
                  	$infojavelinee = 'http://javelinee.com/?p=rss';
                  if (@ file_get_contents($infojavelinee)) {
  							$feedlist = new rss($infojavelinee);
  							echo $feedlist->display(9, "");}
  							else { echo "".$lang['no_information']."";} ?> 
                      
                </section>
            	</section>    
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