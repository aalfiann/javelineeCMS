<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['supercache_setting'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/apps/supercache/save.setting.php" class="form-horizontal" method="post">
		    <div class="form-group">
                  	<label class="col-sm-2 control-label">Super Cache</label>
                      	<div class="col-sm-10">

                        <div class="radio">
                          <label>
                            <input type="radio" name="use" value="enable" <?php if ($supercache['use'] == "enable") echo "checked";?>>
                            Enable
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="use" value="disable" <?php if ($supercache['use'] == "disable") echo "checked";?>>
                            Disable
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>			                   
                  
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['supercache_generate'] ?></label>
                      <div class="col-sm-10">
                        <input name="cache_time" type="text" class="form-control" value="<?= $supercache['max_time'] ?>" placeholder="<?= $lang['supercache_placeholder'] ?>" >
                        <span class="help-block m-b-none"><?=$lang['supercache_generate_help']?></span>
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                  
                    <div class="form-group">
                    	<label class="col-sm-2 control-label"><?= $lang['supercache_size'] ?></label>
                      	<span class="h3 block m-t-xs text-danger"><?php include $root.'acp/model/folder.php'; echo GetDirectorySize($path = $root.'cache/');?> KB</span>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        
                        <a href="<?= $host ?>acp/apps/supercache/clear.cache.php?gen=<?=base64_encode(date('dmY'))?>" title="<?=$lang['supercache_clear']?>" name="clearing" class="btn btn-danger"><?= $lang['supercache_clear'] ?></a>
                        <button type="submit" name="save_supercache" class="btn btn-<?= $site['color'] ?>"><?= $lang['button_save_change'] ?></button>
                        
                      </div>
                    </div>
                   </form>
                  </div>
                  
               </section>