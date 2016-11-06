<?php session_start(); 
include 'config.php'; 
include_once 'model/set.lang.php';
unset($_SESSION['pass']);?>

<div class="modal-over">
  <div class="modal-center animated fadeInUp text-center" style="width:200px;margin:-100px 0 0 -100px;">
    <div class="thumb-md"><img src="<?php if ($userava == "/acp/images/a0.png") echo $host.$userava; else echo $userava; ?>" class="img-circle b-a b-light b-3x"></div>
    <p class="text-white h4 m-t m-b"><?= $user ?></p>
    <div class="input-group-btn">
    <form method="post" action="<?= $host.'acp/model/login.php?username='.$user ?>">
      <input type="password" name="password" class="form-control text-sm btn-rounded" placeholder="<?= $lang['button_enter_pass'] ?>" required>
      <span class="input-group-btn">
        <button name="unlock" class="btn btn-<?= $site['color'] ?> " type="submit" >SUBMIT <i class="fa fa-arrow-right"></i></button>
      </span>
    </form>
    </div>
  </div>
</div>