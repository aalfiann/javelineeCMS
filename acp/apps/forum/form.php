<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $titlelayout ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/apps/forum/controller.php" class="form-horizontal" method="post">
						                   
                  
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['forum_embed'] ?></label>
                      <div class="col-sm-10">
                        <textarea name="content" type="text" class="form-control" rows="5" ><?= $content_old ?></textarea>
                        <span class="help-block m-b-none"><?= $lang['forum_help'] ?></span>
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        
                        <button type="submit" name="save_forum" class="btn btn-<?= $site['color'] ?>"><?= $lang['button_save_change'] ?></button>
                        <?= $viewforum ?>
                      </div>
                    </div>
                    </form>
                  </div>
                  
               </section>