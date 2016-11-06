<div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="<?= $host ?>acp/index.php" class="navbar-brand">
          <i class="fa fa-laptop fa fa-1x"></i>
          <span class="hidden-nav-xs"> <?= $site['title'] ?></span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="<?php if ($userava == "/acp/images/a0.png") echo $host.$userava; else echo $userava; ?>" alt="<?= $user ?>">
            </span>
            <?= $user ?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">            
				
            <li>
              <span class="arrow top"></span>
                <?php if ($_SESSION['mode'] == "master") {echo "<a href=\"".$host."acp/data.user.php\">";}
                  else {echo "<a href=\"".$host."acp/edit.user.php?username=".$user."\">";}?>
                    <?= $lang['user_setting'] ?></a>
            </li>
           
            <li>
              <a href="<?= $host ?>acp/support.php"><?= $lang['help'] ?></a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?= $host ?>acp/logout.php" ><?= $lang['logout'] ?></a>
            </li>
          </ul>
        </li>
      </ul>
      
       <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user" <?php
        $checkbase = basename($_SERVER['SCRIPT_FILENAME']); 
          if ($checkbase == "edit.user.php") echo "hidden";
            elseif ($checkbase == "edit.post.php") echo "hidden";
            elseif ($checkbase == "edit.page.php") echo "hidden";?>>
        
        <li class="dropdown hidden-xs">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
            <i class="fa fa-cog"></i> Language <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">            
				<li>
              <span class="arrow top"></span>
              <a href="<?= $_SERVER['PHP_SELF'] ?>?lang=id">Indonesia</a>
            </li>
            
            <li>
              <span class="arrow top"></span>
              <a href="<?= $_SERVER['PHP_SELF'] ?>?lang=en">English</a>
            </li>
           
            
          </ul>
        </li>
      </ul>


        