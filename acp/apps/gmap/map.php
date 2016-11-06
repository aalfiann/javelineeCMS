<?php 
  include '../../config.php'; 
  include $root.'/acp/model/check.php'; 
  include $root.'/acp/model/set.lang.php'; ?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Google Maps - <?= $site['title'] ?> Admin Control Panel</title>
  <meta name="description" content="Google Maps - <?= $site['title'] ?> Admin Control Panel" />
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
              <p class="h4 font-thin pull-left-xs m-r m-b-sm">Google Maps</p>
              
              <form method="post" id="geocoding_form" class="form-inline m-t-sm pull-right pull-none-xs m-b-sm" role="form">
                 <div class="form-group"> 
                 
                      <input id="address" name="address" class="form-control" placeholder="<?= $lang['find_address'] ?>">
                      <button type="submit" class="btn btn-<?= $site['color']?>"><?= $lang['go'] ?></button>
                 </div>
                 
              </form>
                    
                    
                  
            </header>
            
            
            
              <section class="scrollable">
              		<section class="hbox stretch">
                	<section id="gmap_geocoding" style="min-height:240px;"></section>
	              </section>
            
            
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
  
  <?php include $root.'/acp/body.js.php'; ?>
	<script src="<?= $host ?>/acp/js/maps/query.js"></script>  
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?= $host ?>/acp/js/maps/gmaps.js"></script>
<script src="<?= $host ?>/acp/js/maps/demo.js"></script>
</body>
</html>