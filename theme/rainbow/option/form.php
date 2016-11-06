<form action="<?php echo $host ?>/theme/<?php echo $site['theme']?>/option/controller.php" method="post" class="form-horizontal">
					 
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Theme Style</label>
                      <div class="col-sm-10" >
                      <div class="input-group m-b">
                      <span class="input-group-addon bg-light">Theme Style Activated</span>
                        <input type="text" name="oldstyle" class="form-control" value="<?=$otheme['style']; ?>" readonly><br>
								      </div>
                        <select name="style"  style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' class="form-control m-b">
                          <option >Choose Style</option>
                          <option value="bootstrap">bootstrap</option>
                          <option value="cerulean">cerulean</option>
                          <option value="cosmo">cosmo</option>
                          <option value="cyborg">cyborg</option>
                          <option value="darkly">darkly</option>
                          <option value="flaty">flaty</option>
                          <option value="journal">journal</option>
                          <option value="lumen">lumen</option>
                          <option value="readable">readable</option>
                          <option value="sandstone">sandstone</option>
                          <option value="simplex">simplex</option>
                          <option value="slate">slate</option>
                          <option value="spacelab">spacelab</option>
                          <option value="superhero">superhero</option>
                          <option value="united">united</option>
                          <option value="yeti">yeti</option>
                        </select>
                        
                      </div>
                    </div>          
                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Color Style</label>
                      <div class="col-sm-10" >
                      <div class="input-group m-b">
                      <span class="input-group-addon bg-light">Color Style Activated</span>
                        <input type="text" name="oldcolor" class="form-control" value="<?=$otheme['color']; ?>" readonly><br>
                      </div>
                        <select name="color"  style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' class="form-control m-b">
                          <option >Choose Color</option>
                          <option value="dark">Dark</option>
                          <option value="light">Light</option>
                        </select>
                        
                      </div>
                    </div>          
                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Other Style</label>
                      <div class="col-sm-10" >
                      <div class="input-group m-b">
                      <span class="input-group-addon bg-light">Other Style Activated</span>
                        <input type="text" name="oldother" class="form-control" value="<?=$otheme['other']; ?>" readonly><br>
                      </div>
                        <select name="other"  style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' class="form-control m-b">
                          <option >Choose Other Style</option>
                          <option value="default">Default</option>
                          <option value="inverse">Inverse</option>
                        </select>
                        
                      </div>
                    </div>          
                    <div class="line line-dashed b-b line-lg pull-in"></div>

					 <div class="pull-right">      
                  	<button type="submit" name="<?php echo $savebutton ?>" class="btn btn-<?php echo $site['color'] ?>"><?php echo $lang['button_save_change'] ?></button>
                  </div>
					 </form>

