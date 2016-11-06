<?php 
  if ($_SESSION['mode'] == "user") {
    include_once 'model/login.change.php'; echo GetAnotherInfo();
      if ($show['email'] == null) {echo "<div class=\"alert alert-warning\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button>
            <i class=\"fa fa-ban-circle\"></i> ".$lang['warning_email']."</div>"; }} ?>

<div class="row">

                <div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading">
                      <strong><?= $lang['user_another_info'] ?></strong><br>
                          <?php if (isset($_POST['changeinfo'])) {include_once 'model/login.change.php'; echo ChangeAnotherInfo();}?>
                          <?php include_once 'model/login.change.php'; echo GetAnotherInfo()?>
                     </header>
                      <div class="panel-body">                    
                          <form class="form-horizontal" data-validate="parsley" action="<?= $_SERVER['PHP_SELF'] ?>?username=<?= $data['username']?>" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?= $lang['user_email'] ?></label>
                                  <div class="col-sm-9">
                                  <input type="text" name="email" value="<?php if ($show['email'] != null) {echo $show['email'];}?>" placeholder="<?= $lang['url_email_placeholder'] ?>" class="form-control">
                                  </div>
                            </div>
                            <div class="line line-dashed b-b line-lg pull-in"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?= $lang['user_google'] ?></label>
                                  <div class="col-sm-9">
                                  <input type="text" name="google" value="<?php if ($show['google'] != null) {echo $show['google'];}?>" placeholder="<?= $lang['url_google_placeholder'] ?>" class="form-control">
                                  </div>
                            </div>
                            <div class="line line-dashed b-b line-lg pull-in"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?= $lang['user_aboutme'] ?></label>
                                  <div class="col-sm-9">
                                  <div class="input-group">
                                  <span class="input-group-addon bg-light">about.me/</span>
                                  <input type="text" name="aboutme" value="<?php if ($show['aboutme'] != null) {echo $show['aboutme'];}?>" placeholder="<?= $lang['url_aboutme_placeholder'] ?>" class="form-control">
                                  </div></div>
                            </div>
                            <div class="line line-dashed b-b line-lg pull-in"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?= $lang['user_facebook'] ?></label>
                                  <div class="col-sm-9">
                                  <div class="input-group">
                                  <span class="input-group-addon bg-light">fb.com/</span>
                                  <input type="text" name="facebook" value="<?php if ($show['facebook'] != null) {echo $show['facebook'];}?>" placeholder="<?= $lang['url_facebook_placeholder'] ?>" class="form-control">
                                  </div></div>
                            </div>
                            <div class="line line-dashed b-b line-lg pull-in"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?= $lang['user_twitter'] ?></label>
                                  <div class="col-sm-9">
                                  <div class="input-group">
                                  <span class="input-group-addon bg-light">@</span>
                                  <input type="text" name="twitter" value="<?php if ($show['twitter'] != null) {echo $show['twitter'];}?>" placeholder="<?= $lang['url_twitter_placeholder'] ?>" class="form-control">
                                  </div></div>
                            </div>
                            <div class="line line-dashed b-b line-lg pull-in"></div>

                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <div class="col-sm-7">
                                    <input class="col-sm-3" type="checkbox" name="showme" value="1" <?php if ($show['showme'] == "1") echo "checked";?>>
                                      Show widget about.me
                                  </div>
                                </label>
                              </div>
                            </div>
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                          
                        </div>
                      <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" name="changeinfo" class="btn btn-<?= $site['color'] ?> btn-s-xs"><?= $lang['button_save_change'] ?></button>
                      </footer>
                    </section>
                  </form>
                </div>


                <div class="col-sm-6" <?php if ($_SESSION['mode'] == "user") echo "hidden";?>>
                	<section class="panel panel-default">
                  	<header class="panel-heading">
                     	<strong>User Status</strong><br>
                        	<?php if (isset($_POST['changestatus'])) {include_once 'model/login.change.php'; echo ChangeStatus();}?>
                     </header>
                			<div class="panel-body">                    
                        	<form class="form-horizontal" data-validate="parsley" action="<?= $_SERVER['PHP_SELF'] ?>?username=<?= $data['username']?>" method="post">
   
                        		<div class="form-group">
                          			<label class="col-sm-3 control-label"><?=$lang['user_status']?></label>
                          				<div class="col-sm-9">
                          					<button type="submit" name="changestatus" class="btn btn-<?= $site['color'] ?> btn-s-xs pull-right"><?= $lang['button_confirm'] ?></button>
                           					<div class="input-group">
                           					<select name="status" style="max-height:200px; overflow-y:scroll; overflow-x:hidden;" class="form-control">
												<option value="active">Active</option>								
												<option value="deactive">Deactive</option>
												<option value="suspend">Suspend</option>
											</select>
											</div>
										</div>
                        		</div>
                      		</div>
                      <footer class="panel-footer text-right bg-light lter">
                      	
                      </footer>
                    </section>
                  </form>
                </div>


                <div class="col-sm-6">
                	<section class="panel panel-default">
                  	<header class="panel-heading">
                     	<strong><?= $lang['change_password'] ?></strong><br>
                        	<?php if (isset($_POST['change'])) {include_once 'model/login.change.php'; echo ChangePass();}?>
                     </header>
                			<div class="panel-body">                    
                        	<form class="form-horizontal" data-validate="parsley" action="<?= $_SERVER['PHP_SELF'] ?>?username=<?= $data['username']?>" method="post">
   
                        		<div class="form-group">
                          			<label class="col-sm-3 control-label"><?= $lang['username'] ?></label>
                          				<div class="col-sm-9">
                           				<input type="text" name="username" value="<?= $data['username']?>" class="form-control" readonly>
												</div>
                        		</div>
                        	<div class="line line-dashed b-b line-lg pull-in"></div>
                        	<div class="form-group">
                        	<label class="col-sm-3 control-label"><?= $lang['password'] ?></label>
                          		<div class="col-sm-9">
                            		<div class="row">
                              		<div class="col-sm-6"><input type="text" name="password1" placeholder="<?= $lang['old_password'] ?>" class="form-control"></div>
                              		<div class="col-sm-6"><input type="text" name="password2" placeholder="<?= $lang['new_password'] ?>" class="form-control"></div>
                            		</div>                            
                          		</div>
                        	</div>
                      	</div>
                      <footer class="panel-footer text-right bg-light lter">
                      	<button type="submit" name="change" class="btn btn-<?= $site['color'] ?> btn-s-xs"><?= $lang['button_change_password'] ?></button>
                      </footer>
                    </section>
                  </form>
                </div>


                <div class="col-sm-6">
                	<section class="panel panel-default">
                  	<header class="panel-heading">
                     	<strong><?= $lang['change_avatar'] ?></strong><br>
                        	<?php if (isset($_POST['avachange'])) {include_once 'model/login.change.php'; echo ChangeAva();}?>
                     </header>
                			<div class="panel-body">                    
                        	<form class="form-horizontal" data-validate="parsley" action="<?= $_SERVER['PHP_SELF'] ?>?username=<?= $data['username']?>" method="post">
   
                        		<div class="form-group">
                          			<label class="col-sm-3 control-label"><?= $lang['url_avatar'] ?></label>
                          				<div class="col-sm-9">
                           				<input type="text" name="avatar" value="<?php if ($userava == "/acp/images/a0.png") echo ""; else echo $data['avatar']?>" placeholder="<?= $lang['url_avatar_placeholder'] ?>" class="form-control">
												</div>
                        		</div>
                        	<div class="line line-dashed b-b line-lg pull-in"></div>
                        	
                      	</div>
                      <footer class="panel-footer text-right bg-light lter">
                      	<button type="submit" name="avachange" class="btn btn-<?= $site['color'] ?> btn-s-xs"><?= $lang['button_change_avatar'] ?></button>
                      </footer>
                    </section>
                  </form>
                </div>


                