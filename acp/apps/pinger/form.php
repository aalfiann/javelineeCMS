<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['pinger_sitemap'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?=$_SERVER['PHP_SELF']?>" class="form-horizontal" method="post">
		              <div class="form-group">
                  	<div class="form-group">
                      <label class="col-sm-2 control-label"><?=$lang['pinger_se']?></label>
                      <div class="col-sm-10">
                        <label class="checkbox-inline">
                          <input type="checkbox" name="ask" value="ask"> Ask
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="bing" value="bing"> Bing
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="google" value="google"> Google
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="moreover" value="moreover"> Moreover
                        </label>
                      </div>
                      <div class="col-sm-10 col-sm-offset-10">
                        
                        <button type="submit" name="se_ping" class="btn btn-<?= $site['color'] ?>"><?= $lang['pinger_ping'] ?></button>
                        
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>			                   
                    <ul>
                    <?php if (isset($_POST['se_ping'])) include 'se.ping.php';?>
                    </ul>
                  </div>
                  </form>
                </div>
               </section>

<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['pinger_rssfeed'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?=$_SERVER['PHP_SELF']?>" class="form-horizontal" method="post">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?=$lang['pinger_rss']?></label>
                      <div class="col-sm-10">
                        <label class="checkbox-inline">
                          <input type="checkbox" name="blogsearch" value="blogsearch"> Blogsearch
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="weblogs" value="weblogs"> weblogs
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="blogs" value="blogs"> blo.gs
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="feedburner" value="feedburner"> Feed Burner
                        </label>
                      </div>
                      <div class="col-sm-10 col-sm-offset-10">
                        
                        <button type="submit" name="rss_ping" class="btn btn-<?= $site['color'] ?>"><?= $lang['pinger_ping'] ?></button>
                        
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>                         
                    <ul>
                    <?php if (isset($_POST['rss_ping'])) include 'rss.ping.php';?>
                    </ul>
                  </div>
                  </form>
                </div>
               </section>