<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['recaptcha_setting'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/apps/recaptcha/save.key.php" class="form-horizontal" method="post">
						                   
                  
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['recaptcha_public_key'] ?></label>
                      <div class="col-sm-10">
                        <input name="public_key" type="text" class="form-control" value="<?= $recaptcha['public_key'] ?>" placeholder="<?= $lang['recaptcha_public_help'] ?>" >
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['recaptcha_private_key'] ?></label>
                      <div class="col-sm-10">
                        <input name="private_key" type="text" class="form-control" value="<?= $recaptcha['private_key'] ?>" placeholder="<?= $lang['recaptcha_private_help'] ?>" >
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        
                        <button type="submit" name="save_recaptcha" class="btn btn-<?= $site['color'] ?>"><?= $lang['button_save_change'] ?></button>
                        
                      </div>
                    </div>
                    </form>
                  </div>
                  
               </section>