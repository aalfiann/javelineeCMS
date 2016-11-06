<?php include 'config.php'; include_once 'model/set.lang.php'; ?>

<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>  
  <meta charset="utf-8" />
  <title><?= $lang['error_page'] ?> - <?= $site['title'] ?></title>
  <?php include 'header.acp.php'; ?>
</head>
<body class="">
    <section id="content">
    <div class="row m-n">
      <div class="col-sm-4 col-sm-offset-4">
        <div class="text-center m-b-lg">
          <h1 class="h text-white animated fadeInDownBig">404</h1>
        </div>
        <div class="list-group bg-info auto m-b-sm m-b-lg">
          <a href="<?= $host ?>" class="list-group-item">
            <i class="fa fa-chevron-right icon-muted"></i>
            <i class="fa fa-fw fa-home icon-muted"></i> <?= $lang['go_home'] ?>
          </a>
          <a href="<?= $host ?>?p=post" class="list-group-item">
            <i class="fa fa-chevron-right icon-muted"></i>
            <i class="i i-fw  i-libreoffice icon-muted"></i> <?= $lang['new_post'] ?>
          </a>
        </div>
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