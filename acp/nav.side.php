<div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm"><?= $lang['dashboard'] ?></div>
                  <ul class="nav nav-main" data-ride="collapse">
                    <li class="active">
                      <a href="<?= $host ?>acp/" class="auto">
                        <i class="i i-statistics icon">
                        </i>
                        <span class="font-bold"><?= $lang['information'] ?></span>
                      </a>
                    </li>

                    <!--Konten-->
							<li class="">
                      <a href="javascript:void(0)" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-libreoffice icon">
                        </i>
                        <span class="font-bold"><?= $lang['content'] ?></span>
                      </a>
                      <ul class="nav dk">
                       
                        
                        
                        <li >
                          <a href="<?= $host ?>acp/content/post.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span><?= $lang['posts'] ?></span>
                          </a>
                        </li>
                        
                        <li <?php if ($_SESSION['mode'] =="user") {echo "class=\"hidden\"";}?> >
                          <a href="<?= $host ?>acp/content/page.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span><?= $lang['pages'] ?></span>
                          </a>
                        </li>
                        
						<li <?php if ($_SESSION['mode'] =="user") {echo "class=\"hidden\"";}?> >
                          <a href="<?= $host ?>acp/content/category.post.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span><?= $lang['category'] ?></span>
                          </a>
                        </li>   
                        
                        <li <?php if ($_SESSION['mode'] =="user") {echo "class=\"hidden\"";}?> >
                          <a href="<?= $host ?>acp/content/widget.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span><?= $lang['widget'] ?></span>
                          </a>
                        </li>                     
                        
                      </ul>
                    </li>                    
                    
                    <?php if ($_SESSION['mode'] =="master") { include $root.'/theme/'.$site['theme'].'/nav.side.php';} ?>
                    <?php include $root.'/acp/apps/nav.side.php'; ?>
                    
                    <li class="">
                      <a href="<?= $host ?>acp/support.php" class="auto">
                        <i class="fa fa-group">
                        </i>
                        <span class="font-bold"><?= $lang['discussions_forum'] ?></span>
                      </a>
                    </li>
<!--Advertise-->
                    <li <?php if ($_SESSION['mode'] =="user") {echo "class=\"hidden\"";}?>>
                      <a href="<?= $host ?>acp/advertise/ads.php" class="auto">
                        <i class="fa fa-tags">
                        </i>
                        <span class="font-bold"><?= $lang['advertise'] ?></span>
                      </a>
                    </li>

                  </ul>
                  <div class="line dk hidden-nav-xs"></div>
                  <div class="text-muted text-xs hidden-nav-xs padder m-t-sm m-b-sm"><?= $lang['setting'] ?></div>
                  <ul class="nav">
                    <li <?php if ($_SESSION['mode'] =="user") {echo "class=\"hidden\"";}?> >
                      <a href="<?= $host ?>acp/setting.php">
                        <i class="i i-circle-sm text-info-dk"></i>
                        <span><?= $lang['cp_setting'] ?></span>
                      </a>
                    </li>
                    <li>
                      <?php if ($_SESSION['mode'] == "master") {echo "<a href=\"".$host."acp/data.user.php\">";}
                      		else {echo "<a href=\"".$host."acp/edit.user.php?username=".$user."\">";}?>
                        <i class="i i-circle-sm text-success-dk"></i>
                        <span><?= $lang['user_setting'] ?></span>
                      </a>
                    </li>
                    <li <?php if ($_SESSION['mode'] =="user") {echo "class=\"hidden\"";}?>>
                      <a href="<?= $host ?>acp/seo.php">
                        <i class="i i-circle-sm text-dark-dk"></i>
                        <span><?= $lang['seo_setting'] ?></span>
                      </a>
                    </li>
                    
                  </ul>
                  