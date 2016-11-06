<div class="col-sm-6">
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['seo_setting']; ?> | <?= $site['title']; ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/model/save.seo.php" class="form-horizontal" method="post">
                  <div class="form-group">
                  <label class="col-sm-4 control-label">SEO URL Friendly</label>
                      <div class="col-sm-4">

                        <div class="radio">
                          <label>
                            <input type="radio" name="url" value="clean" <?php if ($seo['type_url'] == "clean") echo "checked";?>>
                            Clean URL
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="url" value="query" <?php if ($seo['type_url'] == "query") echo "checked";?>>
                            Query URL
                          </label>
                        </div>
                      </div>
                    </div>

                   <div class="form-group">
                   <label class="col-sm-4 control-label">All Search Engines</label>
                    <div class="col-sm-4">

                        <div class="radio">
                          <label>
                            <input type="radio" name="spider" value="index,follow" <?php if ($seo['spider'] == "index,follow") echo "checked";?>>
                            Index
                          </label>
                        </div>
                        
                        <div class="radio">
                          <label>
                            <input type="radio" name="spider" value="noindex,nofollow" <?php if ($seo['spider'] == "noindex,nofollow") echo "checked";?>>
                            No Index
                          </label>
                        </div>
                        
                      </div>
                    </div>

                    <div class="line line-dashed b-b line-lg pull-in"></div>
  
                    <label><?= $lang['meta_google_author']; ?></label>
                    <input name="author" type="text" class="form-control" value="<?= $seo['author']; ?>" placeholder="<?= $lang['meta_google_author_placeholder']; ?>">                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>                  
                  
                    <label><?= $lang['meta_alexa_verification']; ?></label>
                    <input name="alexa_webmaster" type="text" class="form-control" value="<?= $seo['alexa_webmaster']; ?>" placeholder="<?= $lang['meta_help_placeholder'] ?>">
								    <span class="help-block m-b-none"><?= $lang['meta_example']; ?> &lt;meta name="alexaVerifyID" content="<b>yiEZTRGBQ9e8aNRGhPNK2urB7d4</b>"/&gt;</span>                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>
               	  
               	    <label><?= $lang['google_webmaster_tools']; ?></label>
                    <input name="google_webmaster" type="text" class="form-control" value="<?= $seo['google_webmaster']; ?>" placeholder="<?= $lang['meta_help_placeholder'] ?>">
                    <span class="help-block m-b-none"><?= $lang['meta_example']; ?> &lt;meta name="google-site-verification" content="<b>dBw5CvburAxi537Rp9qi5uG2174Vb6JwHwIRwPSLIK8</b>"/&gt;</span>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <label><?= $lang['bing_webmaster_tools']; ?></label>
                    <input name="bing_webmaster" type="text" class="form-control" value="<?= $seo['bing_webmaster']; ?>" placeholder="<?= $lang['meta_help_placeholder'] ?>">
                    <span class="help-block m-b-none"><?= $lang['meta_example']; ?> &lt;meta name="msvalidate.01" content="<b>12C1203B5086AECE94EB3A3D9830B2E</b>"/&gt;</span>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <label><?= $lang['pinterest_site_verification']; ?></label>
                    <input name="pinterest_webmaster" type="text" class="form-control" value="<?= $seo['pinterest_webmaster']; ?>" placeholder="<?= $lang['meta_help_placeholder'] ?>">
                    <span class="help-block m-b-none"><?= $lang['meta_example']; ?> &lt;meta name="p:domain_verify" content="<b>f100679e6048d45e4a0b0b92dce1efce</b>"/&gt;</span>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <label><?= $lang['twitter_property_website']; ?></label>
                    <input name="twitter_webmaster" type="text" class="form-control" value="<?= $seo['twitter_webmaster']; ?>" placeholder="<?= $lang['meta_help_placeholder'] ?>">
                    <span class="help-block m-b-none"><?= $lang['meta_example']; ?> &lt;meta property="twitter:account_id" content="<b>9123456</b>"/&gt;</span>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <label><?= $lang['yandex_webmaster_tools']; ?></label>
                    <input name="yandex_webmaster" type="text" class="form-control" value="<?= $seo['yandex_webmaster']; ?>" placeholder="<?= $lang['meta_help_placeholder'] ?>">
                    <span class="help-block m-b-none"><?= $lang['meta_example']; ?> &lt;meta name="yandex-verification" content="<b>44d68e1216009f40</b>"/&gt;</span>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <label><?= $lang['google_analytics']; ?></label>
                    <input name="google_analytics" type="text" class="form-control" value="<?= $seo['google_analytics']; ?>" placeholder="<?= $lang['meta_help_placeholder'] ?>">                      
								    <span class="help-block m-b-none"><?= $lang['google_analytics_help']; ?> <?= $lang['meta_example']; ?> <b>UA-28271448-2</b></span>                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <label><?= $lang['share_this']; ?></label>
                    <input name="share_this" type="text" class="form-control" value="<?= $seo['share_this']; ?>" placeholder="<?= $lang['share_this_placeholder'] ?>">                      
								    <span class="help-block m-b-none"><?= $lang['share_this_help']; ?></span>                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <label><?= $lang['rss_title']; ?></label>
                    <input name="rss_title" type="text" class="form-control" value="<?= $seo['rss_title']; ?>" placeholder="<?= $lang['rss_title_placeholder']; ?>">
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <label><?= $lang['rss_descriptions']; ?></label>
                    <input name="rss_descriptions" type="text" class="form-control" value="<?= $seo['rss_descriptions']; ?>" placeholder="<?= $lang['rss_descriptions_placeholder']; ?>">
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <label><?= $lang['rss_limit']; ?></label>
                    <input name="rss_limit" type="text" class="form-control" value="<?= $seo['rss_limit']; ?>" placeholder="<?= $lang['rss_limit_placeholder']; ?>" required>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <label><?= $lang['sitemap_limit']; ?></label>
                    <input name="sitemap_limit" type="text" class="form-control" value="<?= $seo['sitemap_limit']; ?>" placeholder="<?= $lang['sitemap_limit_placeholder']; ?>" required>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <button type="submit" class="btn btn-<?= $site['color'] ?>"><?= $lang['button_save_change']; ?></button>
                        
                    </form>
                  </div>
                  
               </section>
</div>

<div class="col-sm-6">
<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['s_seo_setting']; ?> | <?= $site['title']; ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/model/save.s.seo.php" class="form-horizontal" method="post">
                  
                    <h4><?= $lang['front_meta']; ?></h4>
                    <label><?= $lang['meta_title']; ?></label>
                    <input name="front_meta_title" type="text" class="form-control" value="<?= $sseo['front_meta_title']; ?>" placeholder="<?= $lang['s_meta_title_help']; ?>">
                    <label><?= $lang['meta_keywords']; ?></label>
                    <input name="front_meta_keywords" type="text" class="form-control" value="<?= $sseo['front_meta_keywords']; ?>" placeholder="<?= $lang['s_meta_keywords_help']; ?>">
                    <label><?= $lang['meta_descriptions']; ?></label>
                    <textarea name="front_meta_description" type="text" class="form-control" placeholder="<?= $lang['s_meta_descriptions_help']; ?>"><?= $sseo['front_meta_description']; ?></textarea>                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>  

                    <h4><?= $lang['hashtag_meta']; ?></h4>
                    <label><?= $lang['meta_title']; ?></label>
                    <input name="hashtag_meta_title" type="text" class="form-control" value="<?= $sseo['hashtag_meta_title']; ?>" placeholder="<?= $lang['s_meta_title_help']; ?>">
                    <label><?= $lang['meta_keywords']; ?></label>
                    <input name="hashtag_meta_keywords" type="text" class="form-control" value="<?= $sseo['hashtag_meta_keywords']; ?>" placeholder="<?= $lang['s_meta_keywords_help']; ?>">
                    <label><?= $lang['meta_descriptions']; ?></label>
                    <textarea name="hashtag_meta_description" type="text" class="form-control" placeholder="<?= $lang['s_meta_descriptions_help']; ?>"><?= $sseo['hashtag_meta_description']; ?></textarea>                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>  

                    <h4><?= $lang['post_meta']; ?></h4>
                    <label><?= $lang['meta_title']; ?></label>
                    <input name="post_meta_title" type="text" class="form-control" value="<?= $sseo['post_meta_title']; ?>" placeholder="<?= $lang['s_meta_title_help']; ?>">
                    <label><?= $lang['meta_keywords']; ?></label>
                    <input name="post_meta_keywords" type="text" class="form-control" value="<?= $sseo['post_meta_keywords']; ?>" placeholder="<?= $lang['s_meta_keywords_help']; ?>">
                    <label><?= $lang['meta_descriptions']; ?></label>
                    <textarea name="post_meta_description" type="text" class="form-control" placeholder="<?= $lang['s_meta_descriptions_help']; ?>"><?= $sseo['post_meta_description']; ?></textarea>                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>  

                    <h4><?= $lang['forum_meta']; ?></h4>
                    <label><?= $lang['meta_title']; ?></label>
                    <input name="forum_meta_title" type="text" class="form-control" value="<?= $sseo['forum_meta_title']; ?>" placeholder="<?= $lang['s_meta_title_help']; ?>">
                    <label><?= $lang['meta_keywords']; ?></label>
                    <input name="forum_meta_keywords" type="text" class="form-control" value="<?= $sseo['forum_meta_keywords']; ?>" placeholder="<?= $lang['s_meta_keywords_help']; ?>">
                    <label><?= $lang['meta_descriptions']; ?></label>
                    <textarea name="forum_meta_description" type="text" class="form-control" placeholder="<?= $lang['s_meta_descriptions_help']; ?>"><?= $sseo['forum_meta_description']; ?></textarea>                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>                
                  
                    <h4><?= $lang['category_meta']; ?></h4>
                    <label><?= $lang['meta_title']; ?></label>
                    <input name="category_meta_title" type="text" class="form-control" value="<?= $sseo['category_meta_title']; ?>" placeholder="<?= $lang['s_meta_title_help']; ?>">
                    <label><?= $lang['meta_keywords']; ?></label>
                    <input name="category_meta_keywords" type="text" class="form-control" value="<?= $sseo['category_meta_keywords']; ?>" placeholder="<?= $lang['s_meta_keywords_help']; ?>">
                    <label><?= $lang['meta_descriptions']; ?></label>
                    <textarea name="category_meta_description" type="text" class="form-control" placeholder="<?= $lang['s_meta_descriptions_help']; ?>"><?= $sseo['category_meta_description']; ?></textarea>                      
                    <div class="line line-dashed b-b line-lg pull-in"></div> 

                    <h4><?= $lang['search_meta']; ?></h4>
                    <label><?= $lang['meta_title']; ?></label>
                    <input name="search_meta_title" type="text" class="form-control" value="<?= $sseo['search_meta_title']; ?>" placeholder="<?= $lang['s_meta_title_help']; ?>">
                    <label><?= $lang['meta_keywords']; ?></label>
                    <input name="search_meta_keywords" type="text" class="form-control" value="<?= $sseo['search_meta_keywords']; ?>" placeholder="<?= $lang['s_meta_keywords_help']; ?>">
                    <label><?= $lang['meta_descriptions']; ?></label>
                    <textarea name="search_meta_description" type="text" class="form-control" placeholder="<?= $lang['s_meta_descriptions_help']; ?>"><?= $sseo['search_meta_description']; ?></textarea>                      
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <button type="submit" class="pull-right btn btn-<?= $site['color'] ?>"><?= $lang['button_save_change']; ?></button>
                        
                    </form>
                  </div>
                  
               </section>
</div>