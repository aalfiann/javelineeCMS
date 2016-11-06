<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['create_new_post'] ?>
                </header>
                <div class="panel-body">
                <form action="<?= $host ?>acp/content/controller.php" class="form-horizontal" method="post">
						  <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['title'] ?></label>
                      <div class="col-sm-11">
                        <input name="titlepost" type="text" class="form-control" value="" maxlength="50" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['content'] ?></label>
                      <div class="col-sm-11">
                        <textarea name="contentpost" class="form-control ckeditor" rows="6"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['url_img'] ?></label>
                      <div class="col-sm-11">
                        <input name="imgpost" type="text" class="form-control" placeholder="<?= $lang['url_img_placeholder'] ?>" value="">
                      </div>
                    </div>
                    
						  <div class="form-group">
                      <label class="col-sm-1 control-label"><?= $lang['category'] ?></label>
                      <div class="col-sm-11" >
                      
                        <select name="catpost"  style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' class="form-control m-b" required>
								<?php $postquery = "SELECT * FROM cat_post";
									$posthasil = mysql_query($postquery);
									if (mysql_num_rows($posthasil) > 0) {								
										while($postdata = mysql_fetch_row($posthasil)) { ?>                         
                          <option value="<?= $postdata[0]?>"><?= $postdata[1]?></option>
                       <?php } 
    								echo "</select>"; 
		 					}else echo "<option></option></select>";?>
                        
                      </div>
                    </div>                     
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['hashtag'] ?></label>
                      <div class="col-sm-11">
                        <input name="hashpost" type="text" class="form-control" placeholder="<?= $lang['hashtag_placeholder'] ?>" value="">
                      </div>
                    </div> 
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>     
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_title'] ?></label>
                      <div class="col-sm-11">
                        <input name="metatitlepost" type="text" class="form-control" value="" maxlength="50" required>
								<span class="help-block m-b-none"><?= $lang['meta_title_help'] ?></span>                      
                      </div>
                    </div>   
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_keywords'] ?></label>
                      <div class="col-sm-11">
                        <input name="metakeywordspost" type="text" class="form-control" value="" required>
								<span class="help-block m-b-none"><?= $lang['meta_keywords_help'] ?></span>                      
                      </div>
                    </div>    
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_descriptions'] ?></label>
                      <div class="col-sm-11">
                        <textarea class="form-control" name="metadescriptionspost" maxlength="200" required></textarea>
                        <span class="help-block m-b-none"><?= $lang['meta_descriptions_help'] ?></span>
                      </div>
                    </div>        
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
            			
                        <input type="submit" class="btn btn-<?= $site['color'] ?> btn-sm pull-right" name="publish_post" value="<?= $lang['button_publish_post'] ?>">
                        <input type="submit" class="btn btn-warning dker btn-sm pull-left" name="draft_post" value="<?= $lang['button_save_draft'] ?>">
                    
                    </form>
					                 
                    </div>            
                
             </section>