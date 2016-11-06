<?php ob_start(); include 'model/dev.mode.php'; include 'config.php'; include_once 'model/set.lang.php';?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?= $lang['signin'] ?> - <?= $site['title'] ?> Admin Control Panel</title>
  <meta name="description" content="<?= $lang['signin'] ?> - <?= $site['title'] ?> Admin Control Panel" />
  					<?php include 'header.acp.php'; ?>
</head>
<body class="">
  <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xl">
      <a class="navbar-brand block" href="<?= $host ?>acp/"><?= $site['title'] ?></a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          
          <?php if (isset($_POST['login'])) {include 'model/login.php'; echo login();}
          		else echo "<strong>".$lang['please_login']."</strong>"; ?>
        </header>
        
			<form method="post" action="<?= $host ?>/?p=login">
          <div class="list-group">
            <div class="list-group-item">
              <input name="username" placeholder="<?= $lang['username'] ?>" class="form-control no-border" required>
            </div>
            <div class="list-group-item">
               <input name="password" type="password" placeholder="<?= $lang['password'] ?>" class="form-control no-border" required>
            </div>
             
          </div>
          <button type="submit" name="login" class="btn btn-lg btn-<?= $site['color'] ?> btn-block"><?= $lang['signin'] ?></button>
          
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small><?= $lang['no_account'] ?></small></p>
          <a href="<?= $host ?>/?p=register" class="btn btn-lg btn-default btn-block"><?= $lang['signup'] ?></a>
        </form>        
        
      </section>
    </div>
  </section>
  <!-- footer -->
   <footer id="footer">
    <?php include 'footer.acp.php'; ?>
  </footer>
  <!-- / footer -->
  
   <?php include 'body.js.php'; ?>
</body>
</html>