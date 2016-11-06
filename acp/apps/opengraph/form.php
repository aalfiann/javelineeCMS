<div class="col-sm-6">
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['ogp_setting'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/apps/opengraph/save.og.fb.php" class="form-horizontal" method="post">
						        
                    <label><?= $lang['ogp_type']; ?></label>
                    <input name="og_type" type="text" class="form-control" value="<?= $opengraph['og_type']; ?>" placeholder="<?= $lang['ogp_type_help']; ?>">
                    <label><?= $lang['ogp_site']; ?></label>
                    <input name="og_site" type="text" class="form-control" value="<?= $opengraph['og_site']; ?>" placeholder="<?= $lang['ogp_site_help']; ?>">
                    
                    <label><?= $lang['ogp_image']; ?></label>
                    <input name="og_image" type="text" class="form-control" value="<?= $opengraph['og_image']; ?>" placeholder="<?= $lang['ogp_image_help']; ?>">
                    <label><?= $lang['ogp_url']; ?></label>
                    <input name="og_url" type="text" class="form-control" value="<?= $opengraph['og_url']; ?>" placeholder="<?= $lang['ogp_url_help']; ?>">
                    <label><?= $lang['ogp_title']; ?></label>
                    <input name="og_title" type="text" class="form-control" value="<?= $opengraph['og_title']; ?>" placeholder="<?= $lang['ogp_title_help']; ?>">
                    <label><?= $lang['ogp_description']; ?></label>
                    <textarea name="og_description" type="text" class="form-control" placeholder="<?= $lang['ogp_description_help']; ?>"><?= $opengraph['og_description']; ?></textarea>                      
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">
                      
                        <div class="col-sm-8">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="content_page" value="1" <?php if ($opengraph['content_page'] == "1") echo "checked";?>>
                              <?=$lang['content_opengraph']?>
                            </label>
                          </div>
                        </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
  
                  
                    <button type="submit" name="save_ogp" class="btn btn-<?= $site['color'] ?>"><?= $lang['button_save_change'] ?></button>
                        
                  </form>
                  </div>
                  
               </section>
</div>

<div class="col-sm-6">
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['twc_setting'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/apps/opengraph/save.og.tw.php" class="form-horizontal" method="post">
                    
                    <label><?= $lang['twc_card']; ?></label>
                    <input name="tw_card" type="text" class="form-control" value="<?= $opengraph['tw_card']; ?>" placeholder="<?= $lang['twc_card_help']; ?>">
                    <label><?= $lang['twc_site']; ?></label>
                    <input name="tw_site" type="text" class="form-control" value="<?= $opengraph['tw_site']; ?>" placeholder="<?= $lang['twc_site_help']; ?>">
                    <label><?= $lang['twc_image']; ?></label>
                    <input name="tw_image" type="text" class="form-control" value="<?= $opengraph['tw_image']; ?>" placeholder="<?= $lang['twc_image_help']; ?>">
                    <label><?= $lang['twc_url']; ?></label>
                    <input name="tw_url" type="text" class="form-control" value="<?= $opengraph['tw_url']; ?>" placeholder="<?= $lang['twc_url_help']; ?>">
                    <label><?= $lang['twc_title']; ?></label>
                    <input name="tw_title" type="text" class="form-control" value="<?= $opengraph['tw_title']; ?>" placeholder="<?= $lang['twc_title_help']; ?>">
                    <label><?= $lang['twc_description']; ?></label>
                    <textarea name="tw_description" type="text" class="form-control" placeholder="<?= $lang['twc_description_help']; ?>"><?= $opengraph['tw_description']; ?></textarea>                      
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">
                      
                        <div class="col-sm-8">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="tw_content_page" value="1" <?php if ($opengraph['tw_content_page'] == "1") echo "checked";?>>
                              <?=$lang['content_opengraph']?>
                            </label>
                          </div>
                        </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
  

                    <button type="submit" name="save_twc" class="pull-right btn btn-<?= $site['color'] ?>"><?= $lang['button_save_change'] ?></button>
                        
                  </form>
                  </div>
                  
               </section>
</div>