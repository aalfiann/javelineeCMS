<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['edit_content_post'] ?>
                </header>
                <div class="panel-body">
                <form action="<?= $host ?>acp/content/controller.php?id=<?= $data['id_post'] ?>" class="form-horizontal" method="post">
              <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['title'] ?></label>
                      <div class="col-sm-11">
                        <input name="titlepost" type="text" class="form-control" value="<?=stripcslashes($data['t_post'])?>" maxlength="50" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['content'] ?></label>
                      <div class="col-sm-11">
                        <textarea name="contentpost" class="form-control ckeditor" rows="6"><?=stripcslashes($data['c_post'])?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['url_img'] ?></label>
                      <div class="col-sm-11">
                        <input name="imgpost" type="text" class="form-control" placeholder="<?= $lang['url_img_placeholder'] ?>" value="<?=stripcslashes($data['img_post'])?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-1 control-label"><?= $lang['category'] ?></label>
                      <div class="col-sm-11" >
                      
                        <select name="catpost"  style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' class="form-control m-b" required>
                <?php $postquery = "SELECT * FROM cat_post";
                  $posthasil = mysql_query($postquery);
                                    $id_post  = $_GET['id'];
                                    $catquery = "SELECT cat_post FROM post WHERE id_post='".mysql_real_escape_string($id_post)."'";
                  $cathasil = mysql_query($catquery);
                                    $newdata = mysql_fetch_array($cathasil);
                                    if (!$posthasil) IsQueryError();
                                    if (!$cathasil) IsQueryError();
                  if (mysql_num_rows($posthasil) > 0) {               
                    while($postdata = mysql_fetch_row($posthasil)) { ?>                         
                          <option value="<?= $postdata[0]?>" <?php if($postdata[0] == $newdata[0]) {echo 'selected="selected"';}?>><?= $postdata[1]?></option>
                       <?php } 
                    echo "</select>"; 
              }else echo "<option></option></select>";?>
                        
                      </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['hashtag'] ?></label>
                      <div class="col-sm-11">
                        <input name="hashpost" type="text" class="form-control" value="<?=stripcslashes($data['hash_post']) ?>">
                      </div>
                    </div>  
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>     
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_title'] ?></label>
                      <div class="col-sm-11">
                        <input name="metatitlepost" type="text" class="form-control" value="<?=stripcslashes($data['mt_post']) ?>" maxlength="50" required>
                      </div>
                    </div>   
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_keywords'] ?></label>
                      <div class="col-sm-11">
                        <input name="metakeywordspost" type="text" class="form-control" value="<?=stripcslashes($data['mk_post']) ?>" required>
                      </div>
                    </div>    
                    
                    <div class="form-group">
                    <label class="col-sm-1 control-label"><?= $lang['meta_descriptions'] ?></label>
                      <div class="col-sm-11">
                        <textarea class="form-control" name="metadescriptionspost" maxlength="200" required><?=stripcslashes($data['md_post'])?></textarea>
                      </div>
                    </div>        
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                     
                     <input type="submit" class="btn btn-danger dker btn-sm pull-left" name="delete_post" value="<?= $lang['button_delete_post'] ?>">
                        <input type="submit" class="btn btn-<?= $site['color'] ?> btn-sm pull-right" name="update_post" value="<?= $lang['button_update_publish_post'] ?>">
                        <input type="submit" class="btn btn-warning dker btn-sm pull-right" name="move_draft_post" value="<?= $lang['button_update_draft'] ?>">
                    
                    </form>
                           
                    </div>            
                
             </section>