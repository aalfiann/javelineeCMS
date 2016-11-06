
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $site['title']; ?> | <?= $lang['setting'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/model/save.setting.php" class="form-horizontal" method="post">
						  <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['site_url'] ?></label>
                      <div class="col-sm-10">
                        <input name="url_site" type="text" class="form-control" value="<?= $site['url_site']; ?>" placeholder="<?= $lang['site_url_placeholder'] ?>">
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>                  
                  
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['site_title'] ?></label>
                      <div class="col-sm-10">
                        <input name="title" type="text" class="form-control" value="<?= $site['title']; ?>">
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
               	  
               	  <div class="form-group">
               	  <label class="col-sm-2 control-label"><?= $lang['site_email'] ?></label>
                      <div class="col-sm-10">
                        <input name="email" type="text" class="form-control" value="<?= $site['email']; ?>">
                      </div>
							</div>                   
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
               	  <label class="col-sm-2 control-label"><?= $lang['site_comment'] ?></label>
                      <div class="col-sm-10">
                        <input name="comment" type="text" class="form-control" placeholder="<?= $lang['site_comment_placeholder'] ?>" value="<?= $comment['disqus']; ?>">
                        <span class="help-block m-b-none"><?= $lang['site_comment_help'] ?></span>
                      </div>
							</div>                   
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['site_author'] ?></label>
                      <div class="col-sm-10">
                        <input name="author" type="text" class="form-control" value="<?= $site['author']; ?>">
                      </div>
							</div>                   
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['site_url_author'] ?></label>
                      <div class="col-sm-10">
                        <input name="url_author" type="text" class="form-control" value="<?= $site['url_author']; ?>">
                      </div>
							</div>                   
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['site_copyright'] ?></label>
                      <div class="col-sm-10">
                        <input name="copyright" type="text" class="form-control" value="<?= $site['copyright']; ?>">
                      </div>
							</div>                   
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['site_directory_script'] ?></label>
                      <div class="col-sm-10">
                      <div class="input-group m-b">
                      <?php if ($site['url_site'] == "") {
                        echo "<span class=\"input-group-addon bg-light\">".$lang['site_url_placeholder']."/</span>"; }
                        else { echo "<span class=\"input-group-addon bg-light\">http://".$_SERVER['HTTP_HOST']."/</span>"; } ?>
                        <input name="dir" type="text" class="form-control" value="<?= $site['dir']; ?>">
                        </div>
                        <span class="help-block m-b-none"><?= $lang['site_directory_script_help'] ?></span>
                      
							</div>
							</div>                   
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['site_default_page'] ?></label>
                      <div class="col-sm-10">
                        <input name="page" type="text" class="form-control" value="<?= $url['page']; ?>" placeholder="<?= $lang['site_default_page_placeholder'] ?>">
                        <span class="help-block m-b-none"><?= $lang['site_default_page_help'] ?></span>
                      </div>
							</div>                   
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['site_color_theme'] ?></label>
                      <div class="col-sm-10" >
                      <div class="input-group m-b">
                      <span class="input-group-addon bg-light"><?= $lang['site_color_active'] ?></span>
                        <input type="text" name="oldcolor" class="form-control" value="<?= $site['color']; ?>" readonly><br>
								</div>
                        <select name="color"  style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' class="form-control m-b">
                          <option >Choose Color</option>
                          <option value="light">light</option>
                          <option value="dark">dark</option>
                          <option value="black">black</option>
                          <option value="primary">primary</option>
                          <option value="success">success</option>
                          <option value="info">info</option>
                          <option value="warning">warning</option>
                          <option value="danger">danger</option>
                        </select>
                        
                      </div>
                    </div>          
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['site_choose_theme'] ?></label>
                      <div class="col-sm-10" >
                      <div class="input-group m-b">
                      <span class="input-group-addon bg-light"><?= $lang['site_theme_active'] ?></span>
                        <input type="text" name="oldtheme" class="form-control" value="<?= $site['theme']; ?>" readonly><br>
								</div>
                        <select name="theme"  style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' class="form-control m-b">
								<option >Choose Theme</option>								
								<?php
									if ($handle = opendir('../theme/')) {
    									$blacklist = array('.', '..', 'somedir', 'somefile.php','index.php');
    										while (false !== ($file = readdir($handle))) {
        										if (!in_array($file, $blacklist)) {
													echo "<option value='$file'>$file</option>";
													}
											}
										closedir($handle);
									}?>
									</select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        
                        <button type="submit" class="btn btn-<?= $site['color'] ?>"><?= $lang['button_save_change'] ?></button>
                      </div>
                    </div>
                    </form>
                  </div>
                  
               </section>