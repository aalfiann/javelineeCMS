<div class="clearfix wrapper dk nav-user hidden-xs">
                  <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb avatar pull-left m-r">                        
                        <img src="<?php if ($userava == "/acp/images/a0.png") echo $host.$userava; else echo $userava; ?>" class="dker" alt="<?= $user ?>">
                        <i class="on md b-light"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-t-xs">
                          <strong class="font-bold text-lt"><?= $user ?></strong> 
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block"><?= $site['title'] ?> Staff</span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">                      
                      <li>
                        <span class="arrow top hidden-nav-xs"></span>
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
                  </div>

                </div>
                