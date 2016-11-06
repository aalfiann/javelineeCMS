<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['edit_content_page'] ?>
                </header>
                <div class="panel-body">
                <form action="<?= $host ?>acp/content/controller.php?id=<?= $data['id_page'] ?>" class="form-horizontal" method="post">
						  <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['title'] ?></label>
                      <div class="col-sm-11">
                        <input name="titlepage" type="text" class="form-control" value="<?= stripcslashes($data['t_page']) ?>" maxlength="50" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['content'] ?></label>
                      <div class="col-sm-11">
                        <textarea name="contentpage" class="form-control ckeditor" rows="6"><?= stripcslashes($data['c_page']) ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['url_img'] ?></label>
                      <div class="col-sm-11">
                        <input name="imgpage" type="text" class="form-control" placeholder="<?= $lang['url_img_placeholder'] ?>" value="<?= stripcslashes($data['img_page']) ?>">
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>     
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_title'] ?></label>
                      <div class="col-sm-11">
                        <input name="metatitlepage" type="text" class="form-control" value="<?= stripcslashes($data['mt_page']) ?>" maxlength="50" required>
                      </div>
                    </div>   
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_keywords'] ?></label>
                      <div class="col-sm-11">
                        <input name="metakeywordspage" type="text" class="form-control" value="<?= stripcslashes($data['mk_page']) ?>" required>
                      </div>
                    </div>    
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_descriptions'] ?></label>
                      <div class="col-sm-11">
                        <textarea class="form-control" name="metadescriptionspage" maxlength="200" required><?= stripcslashes($data['md_page']) ?></textarea>
                      </div>
                    </div>        
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
            			   
            			   <input type="submit" class="btn btn-danger dker btn-sm pull-left" name="delete_page" value="<?= $lang['button_delete_page'] ?>">
                        <input type="submit" class="btn btn-<?= $site['color'] ?> btn-sm pull-right" name="update_page" value="<?= $lang['button_update_publish_page'] ?>">
                        <input type="submit" class="btn btn-warning dker btn-sm pull-right" name="move_draft" value="<?= $lang['button_update_draft'] ?>">
                    
                    </form>
					                 
                    </div>            
                
             </section>