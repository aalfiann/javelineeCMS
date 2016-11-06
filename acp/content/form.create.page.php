<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['create_new_page'] ?>
                </header>
                <div class="panel-body">
                <form action="<?= $host ?>acp/content/controller.php" class="form-horizontal" method="post">
						  <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['title'] ?></label>
                      <div class="col-sm-11">
                        <input name="titlepage" type="text" class="form-control" value="" maxlength="50" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['content'] ?></label>
                      <div class="col-sm-11">
                        <textarea name="contentpage" class="form-control ckeditor" rows="6"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['url_img'] ?></label>
                      <div class="col-sm-11">
                        <input name="imgpage" type="text" class="form-control" placeholder="<?= $lang['url_img_placeholder'] ?>" value="">
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>     
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_title'] ?></label>
                      <div class="col-sm-11">
                        <input name="metatitlepage" type="text" class="form-control" value="" maxlength="50" required>
                      </div>
                    </div>   
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_keywords'] ?></label>
                      <div class="col-sm-11">
                        <input name="metakeywordspage" type="text" class="form-control" value="" required>
                      </div>
                    </div>    
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_descriptions'] ?></label>
                      <div class="col-sm-11">
                        <textarea class="form-control" name="metadescriptionspage" maxlength="200" required></textarea>
                      </div>
                    </div>        
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
            			
                        <input type="submit" class="btn btn-<?= $site['color'] ?> btn-sm pull-right" name="publish_page" value="<?= $lang['button_publish_page'] ?>">
                        <input type="submit" class="btn btn-warning dker btn-sm pull-left" name="draft_page" value="<?= $lang['button_save_draft'] ?>">
                    
                    </form>
					                 
                    </div>            
                
             </section>