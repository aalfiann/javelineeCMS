<?php include 'config.php'; include_once 'model/set.lang.php'; ?>

<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>  
  <meta charset="utf-8" />
  <title><?=$lang['suspended_page'];?> - <?= $site['title'] ?></title>
  <?php include 'header.acp.php'; ?>
</head>
<body class="">
    <section id="content">
    <div class="row m-n">
      <div class="col-sm-4 col-sm-offset-4">
        <div class="text-center m-b-lg">
          <h1 class="h text-white animated fadeInDownBig"></h1>
<h1 class="text-white"><?=$lang['suspended_page'];?></h1>
        </div>

        <p><?=$lang['suspended_info'];?></p>
      </div>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small><?=$site['copyright']?></small>
      </p>
    </div>
  </footer>
  <?php include 'body.js.php'; ?>
</body>
</html>